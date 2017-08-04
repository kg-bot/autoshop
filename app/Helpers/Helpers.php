<?php

namespace App\Helpers;

use FluentDOM;

use Illuminate\Pagination\Paginator;

use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;

class Helpers
{
    /**
     * Method used to save image from URL to cars folder
     * @param  string URL of the image
     * @return string Name of the new image
     */
    public static function save_image($image)
    {
        $image_name = str_random(60);
        ini_set('allow_url_fopen', 1);
        $image = \Image::make($image);
        $image->save(config('filesystems.disks.cars.root') . '/' . $image_name . '.jpg');

        return $image_name . '.jpg';
    }

    public static function get_cars($dom)
    {
        try {
            $cars_elements = $dom->find('article.single-classified:not(.paid-0)');

            foreach($cars_elements as $car_html) {
                // We must do this, otherwise we wouldn't be able to use CSS selectors only XPath
                $car_html = FluentDOM::QueryCss($car_html, 'text/html');
                
                $car['name'] = $car_html->find('h3 span a.ga-title')->text();
                $car['price'] = intval(str_replace('.', '', $car_html->find('h3 span span.price')->text()));
                $car['year'] = (int) $car_html->find('div div:nth-child(2) div div div div:nth-child(1) div.inline-block')->text();
                $car['kilometers'] = intval(str_replace('.', '', $car_html->find('div div:nth-child(2) div div div div:nth-child(1) div.inline-block:nth-child(2)')->text()));

                $image_url = $car_html->find('div div:nth-child(1) a img')->attr('src');

                $image = self::save_image($image_url);

                $car['image_path'] = $image;

                $cars[] = $car;
            }

            return $cars;

        } catch (\Exception $e) {
            echo 'There was some error while fetching latest external cars.<br>';
            echo 'Please notify page owner/admin with the link and error message below.<br>';
            echo '<strong>' . $e->getMessage() . '</strong>';
        }
    }

    /**
     * Method used to manually create pagination
     * @param  array  $data Array of items that will be paginated
     * @param  int    $perPage Number of items per page
     * 
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public static function create_pagination(array $data, int $perPage)
    {
        return new Paginator($data, $perPage);
    }
}