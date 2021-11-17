<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
//    public function testSomething(): void
//    {
/*        $client = static::createClient();
        $crawler = $client->request('GET', '/home');*/

       /* $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello');

        $link = $crawler
            ->filter('a:contains("awesome link")')
            ->link();

        $crawler = $client->click($link);
        $this->assertSelectorTextContains('div', 'Remember me');*/

       /* $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Hello")')->count()
        );
        $this->assertGreaterThan(0, $crawler->filter('h1.class')->count());
        $this->assertCount(1, $crawler->filter('h1'));*/


/*        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertCount(1,$crawler->filter('form'));

        $form = $crawler->selectButton('Sign in')->form();
        $form['email'] = 'admin@admin.com';
        $form['password'] = 'passw';

        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        $this->assertCount(1, $crawler->filter('h1'));*/
        /*$this->assertEquals(1, $crawler->filter('a:contains("logout")')->count());*/
        /*$this->assertSelectorTextContains('a', 'logout');*/

//    }


    /**
     * @dataProvider provideUrls
     *
     */

    public function testSomething($url): void
    {
        $client = static::createClient();
        $crawler = $client->request('Get', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls()
    {
        return [
            ['/home'],
            ['/login'],
        ];
    }
}