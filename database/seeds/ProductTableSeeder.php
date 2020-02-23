<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'imagePath' => 'https://images.fineartamerica.com/images/artworkimages/mediumlarge/1/rose-hand-ellie-nadeau.jpg',
            'title' => 'Rose hand draw',
            'description' => 'Roses are familiar flowers throughout the world. They are known for their layered petals, fragrant smell, variety of colors, and sharp thorns along the stem.',
            'price' => 350
        ]);
        $product->save();
        $product = new Product([
            'imagePath' => 'https://i.etsystatic.com/19213691/r/il/db375c/1856276301/il_794xN.1856276301_qz9o.jpg',
            'title' => 'Sunflower hand draw',
            'description' => 'Sunflowers are symbols of happiness and vitality. They have graced gardens for over 1,000 years, and images of sunflowers are often found in ancient art, especially among Native American peoples.',
            'price' => 120
        ]);
        $product->save();
        $product = new Product([
            'imagePath' => 'https://kalacheva.com/wp-content/uploads/2017/05/The-heart-collector-watm.jpg',
            'title' => 'MARIANA KALACHEVA',
            'description' => 'Drawings – this is one of my favorite approaches when I start playing with the contrast between black and white and the varieties of the gray scale. I often use ink, lavis, feathers, pensils and brushes on paper. While I was creating my first exhibition with this technique, I discovered a whole abundance of the imaging tools. These tools are the treasure of making graphics. As much as you dare to find them out, as much more they will show themselves. I still keep enjoying them.',
            'price' => 190
        ]);
        $product->save();
        $product = new Product([
            'imagePath' => 'https://www.pavlinaalea.com/s/img/emotionheader.jpg',
            'title' => 'Pavlina Paraskova',
            'description' => 'An artist’s mind is sensitive and curious to the changes of her environment and expresses these changes accordingly. We are not unique, inspite of what we have been taught. Our skills, thoughts, ideas, and experiences have been recycled through generations of humanity. Thus, I see art as a lifelong journey and an exhilarating mode of expression."',
            'price' => 200
        ]);
        $product->save();
    }
}
