<?php
/*
|--------------------------------------------------------------------------
| Orador Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Orador::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'aperiam',
		'company' => 'ab',
		'cpf' => '1',
		'rg' => '1',
		'cellphone' => '1',
		'facebook' => 'commodi',
		'twitter' => 'inventore',
		'linkedin' => 'iusto',
		'avatar' => 'illum',
    ];
});

/*
|--------------------------------------------------------------------------
| Participante Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Participante::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'eos',
		'company' => 'voluptates',
		'institution' => 'voluptatem',
		'entryYear' => '1',
		'cpf' => '1',
		'rg' => '1',
		'cellphone' => '1',
		'facebook' => 'nihil',
		'twitter' => 'sed',
		'linkedin' => 'quae',
		'avatar' => 'id',
		'organizer' => 'provident',
    ];
});

/*
|--------------------------------------------------------------------------
| Palestra Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Palestra::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'idSpeaker' => '1',
		'name' => 'sint',
		'description' => 'minus',
		'date' => '1525908873',
		'startSchedule' => '11:34:33',
		'endSchedule' => '11:34:33',
		'local' => 'sed',
    ];
});

/*
|--------------------------------------------------------------------------
| Workshop Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Workshop::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'idSpeaker' => '1',
		'name' => 'reprehenderit',
		'description' => 'magni',
		'date' => '1525909270',
		'startSchedule' => '11:41:10',
		'endSchedule' => '11:41:10',
		'local' => 'ea',
    ];
});

/*
|--------------------------------------------------------------------------
| Programacao Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Programacao::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'name' => 'iste',
		'description' => 'est',
		'date' => '1525909615',
		'startSchedule' => '11:46:55',
		'endSchedule' => '11:46:55',
		'local' => 'molestiae',
    ];
});

/*
|--------------------------------------------------------------------------
| FAQ Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\FAQ::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'category' => 'repellendus',
		'question' => 'excepturi',
		'anwser' => 'enim',
    ];
});

/*
|--------------------------------------------------------------------------
| Foto Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Foto::class, function (Faker\Generator $faker) {
    return [
        'id' => '1',
		'url' => 'doloribus',
		'description' => 'et',
    ];
});
