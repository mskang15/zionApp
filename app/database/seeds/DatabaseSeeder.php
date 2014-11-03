<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

	    $this->call('StudyTableSeeder');

        $this->command->info('Study table seeded');

        $this->call('MemberTableSeeder');

        $this->command->info('Member table seeded');
	}

}

class StudyTableSeeder extends Seeder {

    public function run()
    {
     
    }

}

class MemberTableSeeder extends Seeder {

    public function run()
    {
        Member::create(array('name' => 'John Doe', 'branch' => 'Jane Doe', 'baptism_date' => '2014-05-05'));
        Member::create(array('name' => 'Joseph Doe', 'branch' => 'John Doe', 'baptism_date' => '2014-05-09'));
    }
}
