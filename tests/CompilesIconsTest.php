<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeUiwIcons\BladeUiwIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('uiw-edit')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill="currentColor" d="M2.29171812,13.3600638 L6.81539686,18.1161843 L0.5,20 L2.29171812,13.3600638 Z M12.7049284,2.41181464 L17.2274301,7.16667706 L7.26550878,17.6404299 L2.74300706,12.8855675 L12.7049284,2.41181464 Z M16.1415118,0.347861156 C16.8783654,1.12259394 18.3106609,2.62843788 19.1175863,3.4768634 C19.9245902,4.32524768 19.2036068,5.09020427 19.2036068,5.09020427 L17.6827602,6.68916958 L13.1591207,1.93311092 L14.6798693,0.334186853 L14.6989777,0.315464422 C14.8180473,0.203171183 15.4749058,-0.352994255 16.1415118,0.347861156 Z"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('uiw-edit', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill="currentColor" d="M2.29171812,13.3600638 L6.81539686,18.1161843 L0.5,20 L2.29171812,13.3600638 Z M12.7049284,2.41181464 L17.2274301,7.16667706 L7.26550878,17.6404299 L2.74300706,12.8855675 L12.7049284,2.41181464 Z M16.1415118,0.347861156 C16.8783654,1.12259394 18.3106609,2.62843788 19.1175863,3.4768634 C19.9245902,4.32524768 19.2036068,5.09020427 19.2036068,5.09020427 L17.6827602,6.68916958 L13.1591207,1.93311092 L14.6798693,0.334186853 L14.6989777,0.315464422 C14.8180473,0.203171183 15.4749058,-0.352994255 16.1415118,0.347861156 Z"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('uiw-edit', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill="currentColor" d="M2.29171812,13.3600638 L6.81539686,18.1161843 L0.5,20 L2.29171812,13.3600638 Z M12.7049284,2.41181464 L17.2274301,7.16667706 L7.26550878,17.6404299 L2.74300706,12.8855675 L12.7049284,2.41181464 Z M16.1415118,0.347861156 C16.8783654,1.12259394 18.3106609,2.62843788 19.1175863,3.4768634 C19.9245902,4.32524768 19.2036068,5.09020427 19.2036068,5.09020427 L17.6827602,6.68916958 L13.1591207,1.93311092 L14.6798693,0.334186853 L14.6989777,0.315464422 C14.8180473,0.203171183 15.4749058,-0.352994255 16.1415118,0.347861156 Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-uiw-icons.class', 'awesome');

        $result = svg('uiw-edit')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill="currentColor" d="M2.29171812,13.3600638 L6.81539686,18.1161843 L0.5,20 L2.29171812,13.3600638 Z M12.7049284,2.41181464 L17.2274301,7.16667706 L7.26550878,17.6404299 L2.74300706,12.8855675 L12.7049284,2.41181464 Z M16.1415118,0.347861156 C16.8783654,1.12259394 18.3106609,2.62843788 19.1175863,3.4768634 C19.9245902,4.32524768 19.2036068,5.09020427 19.2036068,5.09020427 L17.6827602,6.68916958 L13.1591207,1.93311092 L14.6798693,0.334186853 L14.6989777,0.315464422 C14.8180473,0.203171183 15.4749058,-0.352994255 16.1415118,0.347861156 Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-uiw-icons.class', 'awesome');

        $result = svg('uiw-edit', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill="currentColor" d="M2.29171812,13.3600638 L6.81539686,18.1161843 L0.5,20 L2.29171812,13.3600638 Z M12.7049284,2.41181464 L17.2274301,7.16667706 L7.26550878,17.6404299 L2.74300706,12.8855675 L12.7049284,2.41181464 Z M16.1415118,0.347861156 C16.8783654,1.12259394 18.3106609,2.62843788 19.1175863,3.4768634 C19.9245902,4.32524768 19.2036068,5.09020427 19.2036068,5.09020427 L17.6827602,6.68916958 L13.1591207,1.93311092 L14.6798693,0.334186853 L14.6989777,0.315464422 C14.8180473,0.203171183 15.4749058,-0.352994255 16.1415118,0.347861156 Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeUiwIconsServiceProvider::class,
        ];
    }
}
