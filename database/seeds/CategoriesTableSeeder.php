<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getOccupationAreas());
        DB::table('categories')->insert($this->getModalities());
        DB::table('categories')->insert($this->getCourseTypes());
        DB::table('categories')->insert($this->getTargetAudiences());
    }

    /**
     * Get the default occupation areas.
     *
     * @return array
     */
    protected function getOccupationAreas()
    {
        return [
            ['name' => 'Administração', 'type' => 'occupation_area', 'icon' => 'fas fa-user-tie'],
            ['name' => 'Ciências Contábeis', 'type' => 'occupation_area', 'icon' => 'fas fa-calculator'],
            ['name' => 'Biomedicina', 'type' => 'occupation_area', 'icon' => 'fas fa-dna'],
            ['name' => 'Direito', 'type' => 'occupation_area', 'icon' => 'fas fa-balance-scale'],
            ['name' => 'Odontologia', 'type' => 'occupation_area', 'icon' => 'fas fa-tooth']
        ];
    }

    /**
     * Get the default modalities.
     *
     * @return array
     */
    protected function getModalities()
    {
        return $this->getCategories('modality', [
            'On-line', 'Presencial', 'Semi-presencial',
        ]);
    }

    /**
     * Get the default course types.
     *
     * @return array
     */
    protected function getCourseTypes()
    {
        return $this->getCategories('course_type', [
            'Curta duração', 'Curso de extensão',
        ]);
    }

    /**
     * Get the default target audiences.
     *
     * @return array
     */
    protected function getTargetAudiences()
    {
        return $this->getCategories('target_audience', [
            'Estudantes', 'Professores',
        ]);
    }

    /**
     * Get an array of categories based on the given names with the given type associated.
     *
     * @param  string $type
     * @param  array  $names
     * @return array
     */
    protected function getCategories($type, array $names)
    {
        return array_map(function ($name) use ($type) {
            return compact('name', 'type');
        }, $names);
    }
}
