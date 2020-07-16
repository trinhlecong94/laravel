<?php

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors  = array("Black", "Blue", "Cyan", "DarkGray", "Gray", "Green", "Light gray", "Magenta", "Orange", "Pink", "Red", "White", "Yellow", "N/A");
        
        foreach ($colors as $value) {
            $color = new Color();
            $color->name=$value;
            $color->save();
        }
    
    }
}
