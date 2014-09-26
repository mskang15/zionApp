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
        DB::table('studies')->delete();

        Study::create(array('studyTitle' => 'The Secret of the Forgiveness of Sins', 'shortName' => 'Forgiveness', 'order'=> 1, 'type'=> 1));
        Study::create(array('studyTitle' => 'When?', 'shortName' => 'When', 'order'=> 2, 'type'=> 1 ));
        Study::create(array('studyTitle' => 'How?', 'shortName' => 'How', 'order'=> 3, 'type'=> 1));
        Study::create(array('studyTitle' => 'The Tree of Life and Christ Ahnsahnghong', 'shortName' => 'Tree of Life', 'order'=> 4, 'type'=> 1));
        Study::create(array('studyTitle' => 'The Savior of Each Age and the New Name', 'shortName' => 'Savior', 'order'=> 5, 'type'=> 1));
        Study::create(array('studyTitle' => 'Whom does the Bible testify about?', 'shortName' => 'Whom', 'order'=> 6, 'type'=> 1));
        Study::create(array('studyTitle' => 'King David and Christ Ahnsahnghong', 'shortName' => 'King David', 'order'=> 7, 'type'=> 1));
        Study::create(array('studyTitle' => 'The Sabbath Day', 'shortName' => 'Sabbath', 'order'=> 8, 'type'=> 1));
        Study::create(array('studyTitle' => 'Where?', 'shortName' => 'Where', 'order'=> 9, 'type'=> 1));
        Study::create(array('studyTitle' => 'Holy Trinity', 'shortName' => 'Holy Trinity', 'order'=> 10, 'type'=> 1));
        Study::create(array('studyTitle' => 'Jerusalem Mother', 'shortName' => 'Jerusalem Mother', 'order'=> 11, 'type'=> 1));
        Study::create(array('studyTitle' => 'Abraham\'s Family', 'shortName' => 'Cross Idolatry','order'=> 12, 'type'=> 1));
        Study::create(array('studyTitle' => 'Old Testament and New Testament Sabbath', 'shortName' => 'OT/NT', 'order'=> 13, 'type'=> 1));
        Study::create(array('studyTitle' => 'Daniel\'s Prophecy and Revelation', 'shortName' => 'Daniel Prophecy', 'order'=> 14, 'type'=> 1));
        Study::create(array('studyTitle' => 'Passover Way to Eternal Life', 'shortName' => 'Passover Way to EL', 'order'=> 15, 'type'=> 1));
        Study::create(array('studyTitle' => 'God Who Established Zion', 'shortName' => 'Who Established Zion', 'order'=> 16, 'type'=> 1));
        Study::create(array('studyTitle' => 'The True Meaning of the Passover', 'shortName' => 'True Meaning','order'=> 17, 'type'=> 1));
        Study::create(array('studyTitle' => 'The Order of Melchizedek', 'shortName' => 'Melchizedek','order'=> 18, 'type'=> 1));
        Study::create(array('studyTitle' => 'The Seal of God', 'shortName' => 'Seal of God','order'=> 19, 'type'=> 1));
        Study::create(array('studyTitle' => 'The Heavenly Wedding Banquet', 'shortName' => 'Wedding Banquet','order'=> 20, 'type'=> 1));
        Study::create(array('studyTitle' => 'video1', 'shortName' => 'video1','order'=> 1, 'type'=> 2));
        Study::create(array('studyTitle' => 'video2', 'shortName' => 'video2','order'=> 2, 'type'=> 2));
        Study::create(array('studyTitle' => 'video3', 'shortName' => 'video3','order'=> 3, 'type'=> 2));
//            array('studyTitle' => 'Mother the Source of the Water of Life', 'shortName' => 'Source of Water'),
//            array('studyTitle' => 'Weeds and Wheat', 'shortName' => 'Weeds and Wheat'),
//            array('studyTitle' => '7 Thunders', 'shortName' => '7 Thunders'),
//            array('studyTitle' => '1st and 2nd Commandment', 'shortName' => '1st and 2nd'),
//            array('studyTitle' => 'The Bible is Fact', 'shortName' => 'Bible is Fact'),
//            array('studyTitle' => 'Be Baptized Immediately', 'shortName' => 'Be Baptized'),
//            array('studyTitle' => 'Heavenly and Earthly Family', 'shortName' => 'Heavenly Family'),
//            array('studyTitle' => 'Tithes and Offerings', 'shortName' => 'Tithe and Offerings'),
//            array('studyTitle' => 'What is the Gospel?', 'shortName' => 'What is Gospel?'))
//        );
    }

}

class MemberTableSeeder extends Seeder {

    public function run()
    {
        Member::create(array('name' => 'John Doe', 'branch' => 'Jane Doe', 'baptism_date' => '2014-05-05'));
        Member::create(array('name' => 'Joseph Doe', 'branch' => 'John Doe', 'baptism_date' => '2014-05-09'));
    }
}