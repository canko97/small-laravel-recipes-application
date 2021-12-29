<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Recipe;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'recipe_name'=> 'Bucatini with Lemony Carbonara',
            'author'=> '1',
            'content'=> 'Heat oil in a large skillet over medium. Cook guanciale, tossing often, until browned and crisp, 6–8 minutes. Add shallots and garlic and cook, stirring occasionally, until softened, about 5 minutes. Add pepper and cook, stirring often, just until fragrant, about 1 minute.
                        Meanwhile, cook pasta in a large pot of boiling salted water, stirring occasionally, until al dente. Drain, reserving 1½ cups pasta cooking liquid.
                        Add pasta to skillet along with ½ cup pasta cooking liquid and 1 oz. Parmesan and toss to coat. Remove skillet from heat and add egg yolks. Toss again, adding more pasta cooking liquid as needed, until a smooth glossy sauce coats pasta. Add grated lemon zest, lemon juice, and another 1 oz. Parmesan. Toss to coat, adding more pasta cooking liquid if needed to loosen sauce.
                        Divide pasta among bowls; top with sliced lemon zest and more Parmesan.',
            'country'=> 'Italian',
            'type' => 'Meat'
        ]);

        DB::table('recipes')->insert([
            'recipe_name'=> 'Pasta alla Gricia',
            'author'=> '1',
            'content'=> 'Heat oil in a large skillet over medium-low. Cook guanciale, stirring often, until it starts to brown and crisp, 10–15 minutes; it will shrink dramatically as the fat renders. Transfer to a small bowl with a slotted spoon; reserve skillet (do not wipe out).
                         Meanwhile, cook pasta in a large pot of boiling lightly salted water, stirring occasionally, until pasta is about halfway cooked (not quite al dente); drain, reserving 1 ½ cups pasta cooking liquid.
                         Add ¾ cup pasta cooking liquid to reserved skillet and bring to a gentle boil over medium heat, swirling often to encourage drippings and liquid to emulsify, about 1 minute. Add pasta and cook, tossing often and adding more pasta cooking liquid as needed, until pasta is al dente and a thick, glossy sauce forms, 5–7 minutes (this second cooking is why you undercook the pasta initially).
                         Increase heat to medium-high. Add guanciale, pepper, and two-thirds of Pecorino; toss well to combine and melt cheese. Serve pasta topped with remaining Pecorino.',
            'country'=> 'Italian',
            'type' => 'Meat'
        ]);

        DB::table('recipes')->insert([
            'recipe_name'=> 'Steak Pizzaiola',
            'author'=> '1',
            'content'=> 'Season steaks generously with salt and pepper. Heat 2 Tbsp. oil in a large skillet over medium-high. Cook steaks, undisturbed, until deeply browned underneath, about 3 minutes. Turn and drain all but 1 Tbsp. fat from skillet (if needed). Place garlic next to steaks and cook, stirring occasionally, until beginning to brown around edges, about 30 seconds. Add basil and red pepper flakes, then marinara. Bring mixture to a simmer and spoon sauce over steaks to smother. Cook steaks until just cooked through but still pink in the center, about 3 minutes.
                         Transfer steaks and sauce to a platter. Sprinkle with oregano and drizzle with oil.',
            'country'=> 'Italian',
            'type' => 'Meat'
        ]);
    }
}
