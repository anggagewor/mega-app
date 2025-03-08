<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Resource;
use App\Models\Subtopic;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class RoadmapPHPSeeder extends Seeder
{
    public function run(): void
    {
        // Insert Topic
        $php = Topic::create([
            'name' => 'PHP Development',
            'description' => 'Panduan lengkap belajar PHP dari dasar hingga mahir.'
        ]);

        // Insert Subtopics dan Content
        $subtopics = [
            [
                'name' => 'Pengenalan PHP',
                'description' => 'Sejarah dan dasar-dasar PHP.',
                'contents' => [
                    ['title' => 'Apa itu PHP?', 'body' => 'PHP adalah bahasa pemrograman yang banyak digunakan untuk pengembangan web.'],
                    ['title' => 'Sejarah PHP', 'body' => 'PHP pertama kali dikembangkan oleh Rasmus Lerdorf pada tahun 1994.'],
                ],
                'resources' => [
                    ['title' => 'Dokumentasi Resmi PHP', 'url' => 'https://www.php.net/docs.php', 'type' => 'docs'],
                    ['title' => 'Belajar PHP Dasar', 'url' => 'https://www.w3schools.com/php/', 'type' => 'article'],
                ],
            ],
            [
                'name' => 'Sintaks Dasar PHP',
                'description' => 'Dasar-dasar sintaks PHP, variabel, dan tipe data.',
                'contents' => [
                    ['title' => 'Variabel dan Tipe Data', 'body' => 'PHP memiliki berbagai tipe data seperti integer, float, string, boolean, dll.'],
                    ['title' => 'Operator dalam PHP', 'body' => 'PHP mendukung berbagai operator seperti aritmatika, logika, dan perbandingan.'],
                ],
                'resources' => [
                    ['title' => 'PHP Syntax di PHP.net', 'url' => 'https://www.php.net/manual/en/language.basic-syntax.php', 'type' => 'docs'],
                ],
            ],
            [
                'name' => 'Pemrograman Berorientasi Objek (OOP)',
                'description' => 'Konsep OOP dalam PHP.',
                'contents' => [
                    ['title' => 'Apa itu OOP?', 'body' => 'OOP adalah paradigma pemrograman berbasis objek yang membantu strukturisasi kode.'],
                    ['title' => 'Class dan Object di PHP', 'body' => 'PHP mendukung konsep OOP dengan class dan object.'],
                ],
                'resources' => [
                    ['title' => 'OOP di PHP', 'url' => 'https://www.php.net/manual/en/language.oop5.php', 'type' => 'docs'],
                ],
            ],
            [
                'name' => 'Framework PHP',
                'description' => 'Mengenal framework PHP seperti Laravel dan CodeIgniter.',
                'contents' => [
                    ['title' => 'Mengenal Laravel', 'body' => 'Laravel adalah salah satu framework PHP yang populer dan digunakan luas.'],
                    ['title' => 'CodeIgniter: Alternatif Ringan', 'body' => 'CodeIgniter adalah framework PHP yang ringan dan cepat.'],
                ],
                'resources' => [
                    ['title' => 'Laravel Documentation', 'url' => 'https://laravel.com/docs', 'type' => 'docs'],
                    ['title' => 'CodeIgniter User Guide', 'url' => 'https://codeigniter.com/userguide3/', 'type' => 'docs'],
                ],
            ],
        ];

        foreach ($subtopics as $subtopicData) {
            $subtopic = Subtopic::create([
                'topic_id' => $php->id,
                'name' => $subtopicData['name'],
                'description' => $subtopicData['description'],
            ]);

            foreach ($subtopicData['contents'] as $content) {
                Content::create([
                    'subtopic_id' => $subtopic->id,
                    'title' => $content['title'],
                    'body' => $content['body'],
                ]);
            }

            foreach ($subtopicData['resources'] as $resource) {
                Resource::create([
                    'subtopic_id' => $subtopic->id,
                    'title' => $resource['title'],
                    'url' => $resource['url'],
                    'type' => $resource['type'],
                ]);
            }
        }
    }
}
