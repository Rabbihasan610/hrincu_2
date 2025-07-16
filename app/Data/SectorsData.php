<?php

namespace App\Data;

class SectorsData
{
    public static function all()
    {
        return [
            // Job Seeker Sectors
            'job' => [
                (object) [
                    'id' => 1,
                    'name' => 'Information Technology',
                    'name_ar' => 'تكنولوجيا المعلومات'
                ],
                (object) [
                    'id' => 2,
                    'name' => 'Finance & Banking',
                    'name_ar' => 'التمويل والبنوك'
                ],
                (object) [
                    'id' => 3,
                    'name' => 'Healthcare',
                    'name_ar' => 'الرعاية الصحية'
                ],
                (object) [
                    'id' => 4,
                    'name' => 'Education',
                    'name_ar' => 'التعليم'
                ],
                (object) [
                    'id' => 5,
                    'name' => 'Engineering',
                    'name_ar' => 'الهندسة'
                ],
            ],

            // Employer Business Sectors
            'business' => [
                (object) [
                    'id' => 101,
                    'name' => 'Technology',
                    'name_ar' => 'التكنولوجيا',
                    'slug' => 'tech'
                ],
                (object) [
                    'id' => 102,
                    'name' => 'Finance',
                    'name_ar' => 'التمويل',
                    'slug' => 'finance'
                ],
                (object) [
                    'id' => 103,
                    'name' => 'Healthcare',
                    'name_ar' => 'الرعاية الصحية',
                    'slug' => 'healthcare'
                ],
                (object) [
                    'id' => 104,
                    'name' => 'Manufacturing',
                    'name_ar' => 'التصنيع',
                    'slug' => 'manufacturing'
                ],
            ],

            // Service Provider Sectors
            'service' => [
                (object) [
                    'id' => 201,
                    'name' => 'Recruitment Services',
                    'name_ar' => 'خدمات التوظيف',
                    'slug' => 'recruitment'
                ],
                (object) [
                    'id' => 202,
                    'name' => 'Training & Development',
                    'name_ar' => 'التدريب والتطوير',
                    'slug' => 'training'
                ],
                (object) [
                    'id' => 203,
                    'name' => 'Outsourcing Support',
                    'name_ar' => 'الدعم الخارجي',
                    'slug' => 'outsourcing'
                ],
                (object) [
                    'id' => 204,
                    'name' => 'Psychological Support',
                    'name_ar' => 'الدعم النفسي',
                    'slug' => 'psychological'
                ],
                (object) [
                    'id' => 205,
                    'name' => 'Call Center Services',
                    'name_ar' => 'خدمات مراكز الاتصال',
                    'slug' => 'call-center'
                ],
                (object) [
                    'id' => 206,
                    'name' => 'HR Tech Solutions',
                    'name_ar' => 'حلول تكنولوجيا الموارد البشرية',
                    'slug' => 'hr-tech'
                ],
                (object) [
                    'id' => 207,
                    'name' => 'Organizational Consulting',
                    'name_ar' => 'استشارات تنظيمية',
                    'slug' => 'consulting'
                ],
            ]
        ];
    }

    public static function forJobSeekers()
    {
        return self::all()['job'];
    }


    public static function forEmployers()
    {
        return self::all()['business'];
    }

    public static function forServiceProviders()
    {
        return self::all()['service'];
    }
}
