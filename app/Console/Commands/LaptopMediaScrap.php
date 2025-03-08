<?php

namespace App\Console\Commands;

use App\Models\LaptopBrand;
use App\Models\LaptopGpu;
use App\Models\LaptopModel;
use App\Models\LaptopPort;
use App\Models\LaptopPowerSpec;
use App\Models\LaptopProcessor;
use App\Models\LaptopRamSlot;
use App\Models\LaptopStorageSlot;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class LaptopMediaScrap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:laptop-media-scrap {--urls= : url to scrap}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws TransportExceptionInterface
     */
    public function handle()
    {
        $urls = $this->option('urls');
        foreach (explode(',', $urls) as $url) {
            $this->info('scrap ' . $url);
            $client = HttpClient::create();
            $response = $client->request('GET', $url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36'
                ]
            ]);
            try {
                $crawler = new Crawler($response->getContent());
                $tables = $crawler->filter('table.specs.responsive');
                $title = $crawler->filterXPath('//div[@style="font-weight: 600;font-size: 22px; color: grey; line-height: 40px;"]');
                $title = $title->text();
                $datas = $tables->each(function (Crawler $tr) {
                    return $tr->filter('tr')->each(function (Crawler $td) {
                        return $td->filter('td')->each(function (Crawler $content) {
                            return $content->text();
                        });
                    });
                });
                $filtered = array_filter($datas, function ($item) {
                    return !empty($item); // Hapus array kosong
                });
                $filtered = array_filter($filtered[0], function ($filter) {
                    return !empty($filter); // Hapus array kosong
                });
                $cleaned = [];
                $cleaned['model']['model'] = $title;
                foreach ($filtered as $items) {
                    if ($items[0] == 'Brand') {
                        $cleaned['model']['brand'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Release Date') {
                        $cleaned['model']['release_year'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Display diagonal') {
                        $cleaned['model']['display_size'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Display resolution') {
                        $cleaned['model']['resolution'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Weight') {
                        $cleaned['model']['weight'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Battery capacity') {
                        $cleaned['model']['battery_capacity'] = $items[1] ?? '';
                    }


                    if ($items[0] == 'USB 3.2 Gen 1 (3.1 Gen 1) Type-A ports quantity') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'USB 3.2 Gen 1 (3.1 Gen 1) Type-A ports quantity'
                        ];
                    }
                    if ($items[0] == 'USB 3.2 Gen 2 (3.1 Gen 2) Type-C ports quantity') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'USB 3.2 Gen 2 (3.1 Gen 2) Type-C ports quantity'
                        ];
                    }
                    if ($items[0] == 'HDMI ports quantity') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'HDMI ports quantity'
                        ];
                    }
                    if ($items[0] == 'USB Sleep-and-Charge ports') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'USB Sleep-and-Charge ports'
                        ];
                    }
                    if ($items[0] == 'Combo headphone/mic port') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => 1,
                            'version' => '-',
                            'port_type' => 'Combo headphone/mic port'
                        ];
                    }
                    if ($items[0] == 'Ethernet LAN (RJ-45) ports') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'Ethernet LAN (RJ-45) ports'
                        ];
                    }
                    if ($items[0] == 'Number of USB ports with PowerShare support') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'PowerShare'
                        ];
                    }
                    if ($items[0] == 'Thunderbolt 4 ports quantity') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'Intel® Thunderbolt 4'
                        ];
                    }
                    if ($items[0] == 'Thunderbolt 3 ports quantity') {
                        $cleaned['port']['port_type'][] = [
                            'quantity' => $items[1] ?? '',
                            'version' => '-',
                            'port_type' => 'Intel® Thunderbolt 3'
                        ];
                    }

                    if ($items[0] == 'On-board graphics card model') {
                        $cleaned['gpu']['model']['integrated'] = [
                            'name' => $items[1] ?? '',
                            'brand' => '',
                            'vram' => 0,
                            'is_integrated' => true
                        ];
                    }
                    if ($items[0] == 'Discrete graphics card model') {
                        if ($items[1] != 'Not available') {
                            $cleaned['gpu']['model']['discrete'] = [
                                'name' => $items[1] ?? '',
                                'brand' => '',
                                'vram' => 0,
                                'is_integrated' => false
                            ];
                        }
                    }
                    if ($items[0] == 'Discrete graphics card memory') {
                        $cleaned['gpu_model_discrete_vram'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Discrete GPU manufacturer') {
                        $cleaned['gpu_model_discrete_brand'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'AC adapter power') {
                        $cleaned['power_specs']['adapter_watt'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Battery capacity') {
                        $cleaned['power_specs']['battery_watt_hour'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Charging port type') {
                        $cleaned['power_specs']['charger_type'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor manufacturer') {
                        $cleaned['processors']['brand'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor model') {
                        $cleaned['processors']['model'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor cores') {
                        $cleaned['processors']['cores'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor threads') {
                        $cleaned['processors']['threads'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Configurable TDP-up frequency') {
                        $cleaned['processors']['base_clock'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor boost frequency') {
                        $cleaned['processors']['turbo_clock'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Configurable TDP-up') {
                        $cleaned['processors']['tdp_watt'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor base power') {
                        $cleaned['processors']['tdp_base_watt'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Processor generation') {
                        $cleaned['processors']['generation'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Memory slots') {
                        $cleaned['ram']['total_slots'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Internal memory') {
                        $cleaned['ram']['max_capacity'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Memory form factor') {
                        $cleaned['ram']['form_factor'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Internal memory type') {
                        $cleaned['ram']['ram_type'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Memory clock speed') {
                        $cleaned['ram']['max_speed'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Memory clock speed') {
                        $cleaned['ram']['max_clock_speed'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Storage media') {
                        $cleaned['storage']['storage_type'] = $items[1] ?? '';
                    }
                    if ($items[0] == 'Storage media') {
                        $cleaned['storage']['total_slots'] = count(explode('+', $items[1]));
                    }
                    if ($items[0] == 'Total storage capacity') {
                        $cleaned['storage']['max_capacity'] = $items[1] ?? '';
                    }
                }
                $brand = LaptopBrand::where('name', $cleaned['model']['brand'])->first();
                if (!$brand) {
                    $brand = new LaptopBrand();
                    $brand->name = $cleaned['model']['brand'];
                    $brand->save();
                }
                $laptop = LaptopModel::where('model', $cleaned['model']['model'])->first();
                if (!$laptop) {
                    $laptop = new LaptopModel();
                    $laptop->brand_id = $brand->id;
                    $laptop->model = $cleaned['model']['model'];
                    $laptop->release_year = isset($cleaned['model']['release_year']) ? explode(' ', $cleaned['model']['release_year'])[2] : '';
                    $laptop->weight = $cleaned['model']['weight'];
                    $laptop->display_size = $cleaned['model']['display_size'];
                    $laptop->resolution = $cleaned['model']['resolution'];
                    $laptop->battery_capacity = $cleaned['model']['battery_capacity'] ?? '-';
                    $laptop->save();
                }
                $prosesor = LaptopProcessor::where('model_id', $laptop->id)->first();
                if (!$prosesor) {
                    $prosesor = new LaptopProcessor();
                    $prosesor->model_id = $laptop->id;
                    $prosesor->brand = $cleaned['processors']['brand'];
                    $prosesor->model = $cleaned['processors']['model'];
                    $prosesor->cores = $cleaned['processors']['cores'] ?? '-';
                    $prosesor->threads = $cleaned['processors']['threads'] ?? '-';
                    $prosesor->base_clock = $cleaned['processors']['base_clock'] ?? '-';
                    $prosesor->turbo_clock = $cleaned['processors']['turbo_clock'] ?? '-';
                    $prosesor->tdp_watt = $cleaned['processors']['tdp_watt']
                        ?? $cleaned['processors']['tdp_base_watt']
                        ?? '-';

                    $prosesor->save();
                }
                $ram = LaptopRamSlot::where('model_id', $laptop->id)->first();
                if (!$ram) {
                    $ram = new LaptopRamSlot();
                    $ram->model_id = $laptop->id;
                    $ram->total_slots = $cleaned['ram']['total_slots'] ?? $cleaned['ram']['form_factor'] ?? '-';
                    $ram->max_capacity = $cleaned['ram']['max_capacity'];
                    $ram->ram_type = $cleaned['ram']['ram_type'];
                    $ram->max_speed = $cleaned['ram']['max_speed'] ?? $cleaned['ram']['max_clock_speed'] ?? '-';
                    $ram->save();
                }
                if (isset($cleaned['gpu']['model']['discrete']['is_integrated'])) {
                    $discrete = LaptopGpu::where('model_id', $laptop->id)->where('is_integrated', $cleaned['gpu']['model']['discrete']['is_integrated'])->first();
                    if (!$discrete) {
                        $discrete = new LaptopGpu();
                        $discrete->model_id = $laptop->id;
                        $discrete->brand = $cleaned['gpu_model_discrete_brand'] ?? '-';
                        $discrete->model = $cleaned['gpu']['model']['discrete']['name'];
                        $discrete->vram = $cleaned['gpu_model_discrete_vram'];
                        $discrete->is_integrated = (boolean)$cleaned['gpu']['model']['discrete']['is_integrated'];
                        $discrete->save();
                    }
                }

                if (isset($cleaned['gpu']['model']['integrated']['is_integrated'])) {
                    $discrete = LaptopGpu::where('model_id', $laptop->id)->where('is_integrated', $cleaned['gpu']['model']['integrated']['is_integrated'])->first();
                    if (!$discrete) {
                        $discrete = new LaptopGpu();
                        $discrete->model_id = $laptop->id;
                        $discrete->brand = '-';
                        $discrete->model = $cleaned['gpu']['model']['integrated']['name'];
                        $discrete->vram = '-';
                        $discrete->is_integrated = (boolean)$cleaned['gpu']['model']['integrated']['is_integrated'];
                        $discrete->save();
                    }
                }

                foreach ($cleaned["port"]["port_type"] as $type) {
                    $port = LaptopPort::where('model_id', $laptop->id)->where('port_type', $type["port_type"])->first();
                    if (!$port) {
                        $port = new LaptopPort();
                        $port->model_id = $laptop->id;
                        $port->port_type = $type['port_type'];
                        $port->quantity = $type['quantity'];
                        $port->version = $type['version'];
                        $port->save();
                    }
                }

                $storage = LaptopStorageSlot::where('model_id', $laptop->id)->first();
                if (!$storage) {
                    $storage = new LaptopStorageSlot();
                    $storage->model_id = $laptop->id;
                    $storage->storage_type = $cleaned["storage"]['storage_type'];
                    $storage->total_slots = $cleaned["storage"]['total_slots'];
                    $storage->max_capacity = $cleaned["storage"]['max_capacity'];
                    $storage->save();
                }
                $power = LaptopPowerSpec::where('model_id', $laptop->id)->first();
                if (!$power) {
                    $power = new LaptopPowerSpec();
                    $power->model_id = $laptop->id;
                    $power->adapter_watt = $cleaned["power_specs"]['adapter_watt'] ?? '-';
                    $power->battery_watt_hour = $cleaned["power_specs"]['battery_watt_hour'] ?? '-';
                    $power->charger_type = $cleaned["power_specs"]['charger_type'] ?? '-';
                    $power->save();
                }
            } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
                dd($e->getMessage());
            }
        }
    }
}
