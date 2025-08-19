<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->create([
            'title' => 'Typography Setting',
            'content' =>
            <<<HTML
            <h2>Heading Level 2</h2>
    <p>
        This is <strong>bold</strong>, <em>italic</em>, 
        <u>underline</u>, <s>strikethrough</s>, 
        H<sub>2</sub>O (subscript), and E = mc<sup>2</sup> (superscript).
    </p>

    <p>
        Here is a <a href="https://example.com">link to Example</a>.
    </p>

    <h3>Heading Level 3</h3>
    <blockquote>
        “This is a blockquote example to test typography plugin styles.”
    </blockquote>

    <p>Inline <code>code snippet</code> inside text.</p>

    <pre><code class="language-php">
// Code block example
function helloWorld() {
    return "Hello, World!";
}
    </code></pre>

    <h3>Lists</h3>
    <ul>
        <li>Unordered item one</li>
        <li>Unordered item two</li>
        <li>Unordered item three</li>
    </ul>

    <ol>
        <li>Ordered item one</li>
        <li>Ordered item two</li>
        <li>Ordered item three</li>
    </ol>

    <h3>Table</h3>
    <table>
        <thead>
            <tr>
                <th>Feature</th>
                <th>Example</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bold</td>
                <td><strong>Text</strong></td>
            </tr>
            <tr>
                <td>Italic</td>
                <td><em>Text</em></td>
            </tr>
            <tr>
                <td>Underline</td>
                <td><u>Text</u></td>
            </tr>
        </tbody>
    </table>
HTML,
        ]);

        Post::factory(fake()->numberBetween(15, 100))->create();
    }
}
