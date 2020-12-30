<?php
namespace Whatafix\TextTagger\Test;

use PHPUnit\Framework\TestCase;
use Whatafix\TextTagger\TextTagger;

class TextTaggerTest extends TestCase
{
    /**
     * TextTagger class
     *
     * @var TextTagger
     */
    private $textTagger;

    public function setUp(): void
    {
        $this->textTagger=new TextTagger();
    }

    public function testTextTaggerResponse()
    {
        
        //ACCURACY_LOW
        $this->assertSame(['animaux','habitation','informatique'], $this->textTagger->getTags('J\'ai vu un chat assis sur un canapé sur internet','test'));


        //ACCURACY_HIGH
        $this->assertSame(['informatique'], $this->textTagger->getTags('Internet et le HTML sont vraiment formidables! C\'est fou comment le web a révolutionné le monde.','test'));



        //No keyword found
        $this->assertSame(['Impossible to find a theme, too few words in our database or sentence not accurate enough.'], $this->textTagger->getTags('Il est impossible de voler.','test'));
    }
}