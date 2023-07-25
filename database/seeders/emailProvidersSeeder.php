<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmailProvider;

class emailProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    	//default set of providers data.
		$providersData = [
		    ['company' => 'Google', 'website' => 'https://mail.google.com', 'email_domain' => '@gmail.com', 'default' => 1],
		    ['company' => 'Microsoft', 'website' => 'https://outlook.live.com', 'email_domain' => '@outlook.com', 'default' => 1],
		    ['company' => 'Yahoo', 'website' => 'https://mail.yahoo.com', 'email_domain' => '@yahoo.com', 'default' => 1],
		    ['company' => 'Apple', 'website' => 'https://www.icloud.com/mail', 'email_domain' => '@icloud.com', 'default' => 1],
		    ['company' => 'AOL', 'website' => 'https://mail.aol.com', 'email_domain' => '@aol.com', 'default' => 1],
		    ['company' => 'ProtonMail', 'website' => 'https://protonmail.com', 'email_domain' => '@protonmail.com', 'default' => 1],
		    ['company' => 'Zoho', 'website' => 'https://mail.zoho.com', 'email_domain' => '@zoho.com', 'default' => 1],
		    ['company' => 'GMX', 'website' => 'https://www.gmx.com/mail', 'email_domain' => '@gmx.com', 'default' => 1],
		    ['company' => 'FastMail', 'website' => 'https://www.fastmail.com', 'email_domain' => '@fastmail.com', 'default' => 1],
		    ['company' => 'Mail.com', 'website' => 'https://www.mail.com', 'email_domain' => '@mail.com', 'default' => 1],
		    ['company' => 'Yandex.Mail', 'website' => 'https://mail.yandex.com/', 'email_domain' => '@yandex.com', 'default' => 1],
		];
		EmailProvider::insert($providersData);
    }
}
