<?php

namespace App\Faker;

use Faker\Provider\Base;

class FakeLongHTMLContentProvider extends Base
{
    public function longHtmlContent()
    {
        $rawHtml = fake()->randomHtml(
            $maxDepth = 4, // Max tag nesting depth
            $maxWidth = 6, // Max number of tags per element
        );

        return $this->generateTiptapContent($rawHtml);
    }

    private function generateTiptapContent(string $baseHtml): string
    {
        // --- 1. Sanitize the base HTML (to remove forms, inputs, etc.) ---
        $unwantedTags = [
            'form',
            'input',
            'textarea',
            'select',
            'button',
            'script',
            'style',
        ];
        $pattern = '/<\/?('.implode('|', $unwantedTags).')[^>]*>/i';
        $baseHtml = preg_replace($pattern, '', $baseHtml);

        // Break the base HTML into paragraphs
        $paragraphs = collect(explode("\n", trim($baseHtml)))
            ->filter(fn($p) => !empty($p) && str_starts_with($p, '<p'));

        $parts = [];

        // --- 2. Initial Section (Longer Introduction) ---
        $parts[] = '<h1>'.fake()->sentence(8).'</h1>';

        // Use several paragraphs for the intro
        for ($i = 0; $i < fake()->numberBetween(3, 5); $i++) {
            $parts[] = '<p>'.fake()->paragraph(fake()->numberBetween(4, 8)).'</p>';
        }

        // --- 3. First Major Section (H2) ---
        $parts[] = '<h2>'.fake()->sentence(6).'</h2>';

        // A large block of text
        for ($i = 0; $i < fake()->numberBetween(5, 8); $i++) {
            $parts[] = '<p>'.fake()->paragraph(fake()->numberBetween(5, 10)).'</p>';
        }

        // --- 4. Tiptap Element: Blockquote and Image ---
        $parts[] = '<blockquote><p>'.fake()->paragraph(3).' '.fake()->sentence(10).'</p></blockquote>';

        $imageUrl = 'https://loremflickr.com/800/600/'.fake()->word().','.fake()->word().'?lock='.fake()->randomNumber(5,
                true);
        $parts[] = '<figure><img src="'.$imageUrl.'" alt="'.fake()->words(4, true).'"><figcaption>'.fake()->words(6,
                true).'</figcaption></figure>';

        // --- 5. Nested Section (H3) ---
        $parts[] = '<h3>'.fake()->sentence(4).'</h3>';

        // More paragraphs
        for ($i = 0; $i < fake()->numberBetween(4, 7); $i++) {
            $parts[] = '<p>'.fake()->paragraph(fake()->numberBetween(4, 8)).'</p>';
        }

        // --- 6. Tiptap Element: Lists ---
        $listType = fake()->randomElements(['ul', 'ol'], 1)[0];
        $listItems = '<'.$listType.'>';
        for ($i = 0; $i < fake()->numberBetween(6, 10); $i++) {
            $listItems .= '<li>'.fake()->sentence(5).'</li>';
        }
        $listItems .= '</'.$listType.'>';
        $parts[] = $listItems;

        // --- 7. Final Major Section (H2) ---
        $parts[] = '<h2>'.fake()->sentence(7).'</h2>';

        // --- 8. Tiptap Element: Code Block ---
        $parts[] = '<p>To achieve this, we often need to consult our documentation:</p>';
        $parts[] = '<pre><code>'.htmlentities("
                    // ".fake()->sentence(4)."
                                class ".fake()->word()."
                                {
                                    public function __construct()
                                    {
                                        // Initialize the object with ".fake()->word()."
                                        \$this->setting = config('app.".fake()->word()."');
                                    }
                                }
                    ").'</code></pre>';

        // --- 9. Conclusion (Remaining paragraphs) ---
        $parts[] = '<h3>Conclusion</h3>';
        // Add a final, very long paragraph
        $parts[] = '<p>'.fake()->paragraph(10).' **'.fake()->sentence(6).'** '.fake()->paragraph(12).'</p>';

        // Return the combined, long, and structured HTML
        return implode("\n\n", $parts);
    }
}
