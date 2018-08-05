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
        DB::table('categories')->insert($this->getShifts());
    }

    /**
     * Get the default occupation areas.
     *
     * @return array
     */
    protected function getOccupationAreas()
    {
        return $this->getCategories('occupation_area', [
            'Administração', 'Ciências Contábeis', 'Biomedicina', 'Direito',
        ]);
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
     * Get the default shifts.
     *
     * @return array
     */
    protected function getShifts()
    {
        return $this->getCategories('shift', [
            'Manhã', 'Tarde', 'Noite',
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
