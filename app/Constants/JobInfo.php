<?php

namespace App\Constants;

class JobInfo
{
    public static function salaryrange()
    {
        return [
            '1' => '1-1000',
            '2' => '1000-2000',
            '3' => '2000-3000',
            '4' => '3000-4000',
            '5' => '4000-5000',
            '6' => '10000-12000',
            '7' => 'To be determined later',
        ];
    }

    public static function salarytype()
    {
        return [
            '1' => 'Hourly',
            '2' => 'Weekly',
            '3' => 'Monthly',
            '4' => 'Yearly',
        ];
    }

    public static function jobtype()
    {
        return [
            '1' => 'Contact',
            '2' => 'Freelance',
            '3' => 'Full Time',
            '4' => 'Internship',
            '5' => 'Part Time',
            '6' => 'Temporary',
        ];
    }

    public static function qualification()
    {
        return [
            '1' => 'Medium proficiency',
            '2' => 'High School',
            '3' => 'Post-secondary diploma',
            '4' => 'BSC',
            '5' => 'Diploma after Bachelor',
            '6' => 'Masters',
            '7' => 'PhD',
            '8' => 'Co-professor',
            '9' => 'Prof',
        ];
    }

    public static function salarycurrency()
    {
        return [
            '1' => 'USD',
            '2' => 'Euro',
            '3' => 'Pound',
            '4' => 'Rupees',
            '5' => 'Riyal',
        ];
    }

    public static function experience()
    {
        return [
            '1' => '1-4 years',
            '2' => '5-10 years',
            '3' => 'More than 10 years',
        ];
    }

    public static function levels()
    {
        return [
            '1' => 'Executive',
            '2' => 'Manager',
            '3' => 'Officier',
            '4' => 'Student',
            '5' => 'Companies',
        ];
    }
}
