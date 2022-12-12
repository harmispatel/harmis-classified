<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Country Details
        $countries = array(
            [
              'id' => '1',
              'name' => 'Afghanistan',
              'status' => 1
            ],
            [
              'id' => '2',
              'name' => 'Albania',
              'status' => 1
            ],
            [
              'id' => '3',
              'name' => 'Algeria',
              'status' => 1
            ],
            [
              'id' => '4',
              'name' => 'American Samoa',
              'status' => 1
            ],
            [
              'id' => '5',
              'name' => 'Andorra',
              'status' => 1
            ],
            [
              'id' => '6',
              'name' => 'Angola',
              'status' => 1
            ],
            [
              'id' => '7',
              'name' => 'Anguilla',
              'status' => 1
            ],
            [
              'id' => '8',
              'name' => 'Antarctica',
              'status' => 1
            ],
            [
              'id' => '9',
              'name' => 'Antigua and Barbuda',
              'status' => 1
            ],
            [
              'id' => '10',
              'name' => 'Argentina',
              'status' => 1
            ],
            [
              'id' => '11',
              'name' => 'Armenia',
              'status' => 1
            ],
            [
              'id' => '12',
              'name' => 'Aruba',
              'status' => 1
            ],
            [
              'id' => '13',
              'name' => 'Australia',
              'status' => 1
            ],
            [
              'id' => '14',
              'name' => 'Austria',
              'status' => 1
            ],
            [
              'id' => '15',
              'name' => 'Azerbaijan',
              'status' => 1
            ],
            [
              'id' => '16',
              'name' => 'Bahamas',
              'status' => 1
            ],
            [
              'id' => '17',
              'name' => 'Bahrain',
              'status' => 1
            ],
            [
              'id' => '18',
              'name' => 'Bangladesh',
              'status' => 1
            ],
            [
              'id' => '19',
              'name' => 'Barbados',
              'status' => 1
            ],
            [
              'id' => '20',
              'name' => 'Belarus',
              'status' => 1
            ],
            [
              'id' => '21',
              'name' => 'Belgium',
              'status' => 1
            ],
            [
              'id' => '22',
              'name' => 'Belize',
              'status' => 1
            ],
            [
              'id' => '23',
              'name' => 'Benin',
              'status' => 1
            ],
            [
              'id' => '24',
              'name' => 'Bermuda',
              'status' => 1
            ],
            [
              'id' => '25',
              'name' => 'Bhutan',
              'status' => 1
            ],
            [
              'id' => '26',
              'name' => 'Bolivia',
              'status' => 1
            ],
            [
              'id' => '27',
              'name' => 'Bosnia and Herzegovina',
              'status' => 1
            ],
            [
              'id' => '28',
              'name' => 'Botswana',
              'status' => 1
            ],
            [
              'id' => '29',
              'name' => 'Bouvet Island',
              'status' => 1
            ],
            [
              'id' => '30',
              'name' => 'Brazil',
              'status' => 1
            ],
            [
              'id' => '31',
              'name' => 'British Indian Ocean Territory',
              'status' => 1
            ],
            [
              'id' => '32',
              'name' => 'Brunei Darussalam',
              'status' => 1
            ],
            [
              'id' => '33',
              'name' => 'Bulgaria',
              'status' => 1
            ],
            [
              'id' => '34',
              'name' => 'Burkina Faso',
              'status' => 1
            ],
            [
              'id' => '35',
              'name' => 'Burundi',
              'status' => 1
            ],
            [
              'id' => '36',
              'name' => 'Cambodia',
              'status' => 1
            ],
            [
              'id' => '37',
              'name' => 'Cameroon',
              'status' => 1
            ],
            [
              'id' => '38',
              'name' => 'Canada',
              'status' => 1
            ],
            [
              'id' => '39',
              'name' => 'Cape Verde',
              'status' => 1
            ],
            [
              'id' => '40',
              'name' => 'Cayman Islands',
              'status' => 1
            ],
            [
              'id' => '41',
              'name' => 'Central African Republic',
              'status' => 1
            ],
            [
              'id' => '42',
              'name' => 'Chad',
              'status' => 1
            ],
            [
              'id' => '43',
              'name' => 'Chile',
              'status' => 1
            ],
            [
              'id' => '44',
              'name' => 'China',
              'status' => 1
            ],
            [
              'id' => '45',
              'name' => 'Christmas Island',
              'status' => 1
            ],
            [
              'id' => '46',
              'name' => 'Cocos (Keeling] Islands',
              'status' => 1
            ],
            [
              'id' => '47',
              'name' => 'Colombia',
              'status' => 1
            ],
            [
              'id' => '48',
              'name' => 'Comoros',
              'status' => 1
            ],
            [
              'id' => '49',
              'name' => 'Congo',
              'status' => 1
            ],
            [
              'id' => '50',
              'name' => 'Cook Islands',
              'status' => 1
            ],
            [
              'id' => '51',
              'name' => 'Costa Rica',
              'status' => 1
            ],
            [
              'id' => '52',
              'name' => 'Cote D\'Ivoire',
              'status' => 1
            ],
            [
              'id' => '53',
              'name' => 'Croatia',
              'status' => 1
            ],
            [
              'id' => '54',
              'name' => 'Cuba',
              'status' => 1
            ],
            [
              'id' => '55',
              'name' => 'Cyprus',
              'status' => 1
            ],
            [
              'id' => '56',
              'name' => 'Czech Republic',
              'status' => 1
            ],
            [
              'id' => '57',
              'name' => 'Denmark',
              'status' => 1
            ],
            [
              'id' => '58',
              'name' => 'Djibouti',
              'status' => 1
            ],
            [
              'id' => '59',
              'name' => 'Dominica',
              'status' => 1
            ],
            [
              'id' => '60',
              'name' => 'Dominican Republic',
              'status' => 1
            ],
            [
              'id' => '61',
              'name' => 'East Timor',
              'status' => 1
            ],
            [
              'id' => '62',
              'name' => 'Ecuador',
              'status' => 1
            ],
            [
              'id' => '63',
              'name' => 'Egypt',
              'status' => 1
            ],
            [
              'id' => '64',
              'name' => 'El Salvador',
              'status' => 1
            ],
            [
              'id' => '65',
              'name' => 'Equatorial Guinea',
              'status' => 1
            ],
            [
              'id' => '66',
              'name' => 'Eritrea',
              'status' => 1
            ],
            [
              'id' => '67',
              'name' => 'Estonia',
              'status' => 1
            ],
            [
              'id' => '68',
              'name' => 'Ethiopia',
              'status' => 1
            ],
            [
              'id' => '69',
              'name' => 'Falkland Islands (Malvinas]',
              'status' => 1
            ],
            [
              'id' => '70',
              'name' => 'Faroe Islands',
              'status' => 1
            ],
            [
              'id' => '71',
              'name' => 'Fiji',
              'status' => 1
            ],
            [
              'id' => '72',
              'name' => 'Finland',
              'status' => 1
            ],
            [
              'id' => '74',
              'name' => 'France, Metropolitan',
              'status' => 1
            ],
            [
              'id' => '75',
              'name' => 'French Guiana',
              'status' => 1
            ],
            [
              'id' => '76',
              'name' => 'French Polynesia',
              'status' => 1
            ],
            [
              'id' => '77',
              'name' => 'French Southern Territories',
              'status' => 1
            ],
            [
              'id' => '78',
              'name' => 'Gabon',
              'status' => 1
            ],
            [
              'id' => '79',
              'name' => 'Gambia',
              'status' => 1
            ],
            [
              'id' => '80',
              'name' => 'Georgia',
              'status' => 1
            ],
            [
              'id' => '81',
              'name' => 'Germany',
              'status' => 1
            ],
            [
              'id' => '82',
              'name' => 'Ghana',
              'status' => 1
            ],
            [
              'id' => '83',
              'name' => 'Gibraltar',
              'status' => 1
            ],
            [
              'id' => '84',
              'name' => 'Greece',
              'status' => 1
            ],
            [
              'id' => '85',
              'name' => 'Greenland',
              'status' => 1
            ],
            [
              'id' => '86',
              'name' => 'Grenada',
              'status' => 1
            ],
            [
              'id' => '87',
              'name' => 'Guadeloupe',
              'status' => 1
            ],
            [
              'id' => '88',
              'name' => 'Guam',
              'status' => 1
            ],
            [
              'id' => '89',
              'name' => 'Guatemala',
              'status' => 1
            ],
            [
              'id' => '90',
              'name' => 'Guinea',
              'status' => 1
            ],
            [
              'id' => '91',
              'name' => 'Guinea-Bissau',
              'status' => 1
            ],
            [
              'id' => '92',
              'name' => 'Guyana',
              'status' => 1
            ],
            [
              'id' => '93',
              'name' => 'Haiti',
              'status' => 1
            ],
            [
              'id' => '94',
              'name' => 'Heard and Mc Donald Islands',
              'status' => 1
            ],
            [
              'id' => '95',
              'name' => 'Honduras',
              'status' => 1
            ],
            [
              'id' => '96',
              'name' => 'Hong Kong',
              'status' => 1
            ],
            [
              'id' => '97',
              'name' => 'Hungary',
              'status' => 1
            ],
            [
              'id' => '98',
              'name' => 'Iceland',
              'status' => 1
            ],
            [
              'id' => '99',
              'name' => 'India',
              'status' => 1
            ],
            [
              'id' => '100',
              'name' => 'Indonesia',
              'status' => 1
            ],
            [
              'id' => '101',
              'name' => 'Iran (Islamic Republic of]',
              'status' => 1
            ],
            [
              'id' => '102',
              'name' => 'Iraq',
              'status' => 1
            ],
            [
              'id' => '103',
              'name' => 'Ireland',
              'status' => 1
            ],
            [
              'id' => '104',
              'name' => 'Israel',
              'status' => 1
            ],
            [
              'id' => '105',
              'name' => 'Italy',
              'status' => 1
            ],
            [
              'id' => '106',
              'name' => 'Jamaica',
              'status' => 1
            ],
            [
              'id' => '107',
              'name' => 'Japan',
              'status' => 1
            ],
            [
              'id' => '108',
              'name' => 'Jordan',
              'status' => 1
            ],
            [
              'id' => '109',
              'name' => 'Kazakhstan',
              'status' => 1
            ],
            [
              'id' => '110',
              'name' => 'Kenya',
              'status' => 1
            ],
            [
              'id' => '111',
              'name' => 'Kiribati',
              'status' => 1
            ],
            [
              'id' => '112',
              'name' => 'North Korea',
              'status' => 1
            ],
            [
              'id' => '113',
              'name' => 'South Korea',
              'status' => 1
            ],
            [
              'id' => '114',
              'name' => 'Kuwait',
              'status' => 1
            ],
            [
              'id' => '115',
              'name' => 'Kyrgyzstan',
              'status' => 1
            ],
            [
              'id' => '116',
              'name' => 'Lao People\'s Democratic Republic',
              'status' => 1
            ],
            [
              'id' => '117',
              'name' => 'Latvia',
              'status' => 1
            ],
            [
              'id' => '118',
              'name' => 'Lebanon',
              'status' => 1
            ],
            [
              'id' => '119',
              'name' => 'Lesotho',
              'status' => 1
            ],
            [
              'id' => '120',
              'name' => 'Liberia',
              'status' => 1
            ],
            [
              'id' => '121',
              'name' => 'Libyan Arab Jamahiriya',
              'status' => 1
            ],
            [
              'id' => '122',
              'name' => 'Liechtenstein',
              'status' => 1
            ],
            [
              'id' => '123',
              'name' => 'Lithuania',
              'status' => 1
            ],
            [
              'id' => '124',
              'name' => 'Luxembourg',
              'status' => 1
            ],
            [
              'id' => '125',
              'name' => 'Macau',
              'status' => 1
            ],
            [
              'id' => '126',
              'name' => 'FYROM',
              'status' => 1
            ],
            [
              'id' => '127',
              'name' => 'Madagascar',
              'status' => 1
            ],
            [
              'id' => '128',
              'name' => 'Malawi',
              'status' => 1
            ],
            [
              'id' => '129',
              'name' => 'Malaysia',
              'status' => 1
            ],
            [
              'id' => '130',
              'name' => 'Maldives',
              'status' => 1
            ],
            [
              'id' => '131',
              'name' => 'Mali',
              'status' => 1
            ],
            [
              'id' => '132',
              'name' => 'Malta',
              'status' => 1
            ],
            [
              'id' => '133',
              'name' => 'Marshall Islands',
              'status' => 1
            ],
            [
              'id' => '134',
              'name' => 'Martinique',
              'status' => 1
            ],
            [
              'id' => '135',
              'name' => 'Mauritania',
              'status' => 1
            ],
            [
              'id' => '136',
              'name' => 'Mauritius',
              'status' => 1
            ],
            [
              'id' => '137',
              'name' => 'Mayotte',
              'status' => 1
            ],
            [
              'id' => '138',
              'name' => 'Mexico',
              'status' => 1
            ],
            [
              'id' => '139',
              'name' => 'Micronesia, Federated States of',
              'status' => 1
            ],
            [
              'id' => '140',
              'name' => 'Moldova, Republic of',
              'status' => 1
            ],
            [
              'id' => '141',
              'name' => 'Monaco',
              'status' => 1
            ],
            [
              'id' => '142',
              'name' => 'Mongolia',
              'status' => 1
            ],
            [
              'id' => '143',
              'name' => 'Montserrat',
              'status' => 1
            ],
            [
              'id' => '144',
              'name' => 'Morocco',
              'status' => 1
            ],
            [
              'id' => '145',
              'name' => 'Mozambique',
              'status' => 1
            ],
            [
              'id' => '146',
              'name' => 'Myanmar',
              'status' => 1
            ],
            [
              'id' => '147',
              'name' => 'Namibia',
              'status' => 1
            ],
            [
              'id' => '148',
              'name' => 'Nauru',
              'status' => 1
            ],
            [
              'id' => '149',
              'name' => 'Nepal',
              'status' => 1
            ],
            [
              'id' => '150',
              'name' => 'Netherlands',
              'status' => 1
            ],
            [
              'id' => '151',
              'name' => 'Netherlands Antilles',
              'status' => 1
            ],
            [
              'id' => '152',
              'name' => 'New Caledonia',
              'status' => 1
            ],
            [
              'id' => '153',
              'name' => 'New Zealand',
              'status' => 1
            ],
            [
              'id' => '154',
              'name' => 'Nicaragua',
              'status' => 1
            ],
            [
              'id' => '155',
              'name' => 'Niger',
              'status' => 1
            ],
            [
              'id' => '156',
              'name' => 'Nigeria',
              'status' => 1
            ],
            [
              'id' => '157',
              'name' => 'Niue',
              'status' => 1
            ],
            [
              'id' => '158',
              'name' => 'Norfolk Island',
              'status' => 1
            ],
            [
              'id' => '159',
              'name' => 'Northern Mariana Islands',
              'status' => 1
            ],
            [
              'id' => '160',
              'name' => 'Norway',
              'status' => 1
            ],
            [
              'id' => '161',
              'name' => 'Oman',
              'status' => 1
            ],
            [
              'id' => '162',
              'name' => 'Pakistan',
              'status' => 1
            ],
            [
              'id' => '163',
              'name' => 'Palau',
              'status' => 1
            ],
            [
              'id' => '164',
              'name' => 'Panama',
              'status' => 1
            ],
            [
              'id' => '165',
              'name' => 'Papua New Guinea',
              'status' => 1
            ],
            [
              'id' => '166',
              'name' => 'Paraguay',
              'status' => 1
            ],
            [
              'id' => '167',
              'name' => 'Peru',
              'status' => 1
            ],
            [
              'id' => '168',
              'name' => 'Philippines',
              'status' => 1
            ],
            [
              'id' => '169',
              'name' => 'Pitcairn',
              'status' => 1
            ],
            [
              'id' => '170',
              'name' => 'Poland',
              'status' => 1
            ],
            [
              'id' => '171',
              'name' => 'Portugal',
              'status' => 1
            ],
            [
              'id' => '172',
              'name' => 'Puerto Rico',
              'status' => 1
            ],
            [
              'id' => '173',
              'name' => 'Qatar',
              'status' => 1
            ],
            [
              'id' => '174',
              'name' => 'Reunion',
              'status' => 1
            ],
            [
              'id' => '175',
              'name' => 'Romania',
              'status' => 1
            ],
            [
              'id' => '176',
              'name' => 'Russian Federation',
              'status' => 1
            ],
            [
              'id' => '177',
              'name' => 'Rwanda',
              'status' => 1
            ],
            [
              'id' => '178',
              'name' => 'Saint Kitts and Nevis',
              'status' => 1
            ],
            [
              'id' => '179',
              'name' => 'Saint Lucia',
              'status' => 1
            ],
            [
              'id' => '180',
              'name' => 'Saint Vincent and the Grenadines',
              'status' => 1
            ],
            [
              'id' => '181',
              'name' => 'Samoa',
              'status' => 1
            ],
            [
              'id' => '182',
              'name' => 'San Marino',
              'status' => 1
            ],
            [
              'id' => '183',
              'name' => 'Sao Tome and Principe',
              'status' => 1
            ],
            [
              'id' => '184',
              'name' => 'Saudi Arabia',
              'status' => 1
            ],
            [
              'id' => '185',
              'name' => 'Senegal',
              'status' => 1
            ],
            [
              'id' => '186',
              'name' => 'Seychelles',
              'status' => 1
            ],
            [
              'id' => '187',
              'name' => 'Sierra Leone',
              'status' => 1
            ],
            [
              'id' => '188',
              'name' => 'Singapore',
              'status' => 1
            ],
            [
              'id' => '189',
              'name' => 'Slovak Republic',
              'status' => 1
            ],
            [
              'id' => '190',
              'name' => 'Slovenia',
              'status' => 1
            ],
            [
              'id' => '191',
              'name' => 'Solomon Islands',
              'status' => 1
            ],
            [
              'id' => '192',
              'name' => 'Somalia',
              'status' => 1
            ],
            [
              'id' => '193',
              'name' => 'South Africa',
              'status' => 1
            ],
            [
              'id' => '194',
              'name' => 'South Georgia &amp; South Sandwich Islands',
              'status' => 1
            ],
            [
              'id' => '195',
              'name' => 'Spain',
              'status' => 1
            ],
            [
              'id' => '196',
              'name' => 'Sri Lanka',
              'status' => 1
            ],
            [
              'id' => '197',
              'name' => 'St. Helena',
              'status' => 1
            ],
            [
              'id' => '198',
              'name' => 'St. Pierre and Miquelon',
              'status' => 1
            ],
            [
              'id' => '199',
              'name' => 'Sudan',
              'status' => 1
            ],
            [
              'id' => '200',
              'name' => 'Suriname',
              'status' => 1
            ],
            [
              'id' => '201',
              'name' => 'Svalbard and Jan Mayen Islands',
              'status' => 1
            ],
            [
              'id' => '202',
              'name' => 'Swaziland',
              'status' => 1
            ],
            [
              'id' => '203',
              'name' => 'Sweden',
              'status' => 1
            ],
            [
              'id' => '204',
              'name' => 'Switzerland',
              'status' => 1
            ],
            [
              'id' => '205',
              'name' => 'Syrian Arab Republic',
              'status' => 1
            ],
            [
              'id' => '206',
              'name' => 'Taiwan',
              'status' => 1
            ],
            [
              'id' => '207',
              'name' => 'Tajikistan',
              'status' => 1
            ],
            [
              'id' => '208',
              'name' => 'Tanzania, United Republic of',
              'status' => 1
            ],
            [
              'id' => '209',
              'name' => 'Thailand',
              'status' => 1
            ],
            [
              'id' => '210',
              'name' => 'Togo',
              'status' => 1
            ],
            [
              'id' => '211',
              'name' => 'Tokelau',
              'status' => 1
            ],
            [
              'id' => '212',
              'name' => 'Tonga',
              'status' => 1
            ],
            [
              'id' => '213',
              'name' => 'Trinidad and Tobago',
              'status' => 1
            ],
            [
              'id' => '214',
              'name' => 'Tunisia',
              'status' => 1
            ],
            [
              'id' => '215',
              'name' => 'Turkey',
              'status' => 1
            ],
            [
              'id' => '216',
              'name' => 'Turkmenistan',
              'status' => 1
            ],
            [
              'id' => '217',
              'name' => 'Turks and Caicos Islands',
              'status' => 1
            ],
            [
              'id' => '218',
              'name' => 'Tuvalu',
              'status' => 1
            ],
            [
              'id' => '219',
              'name' => 'Uganda',
              'status' => 1
            ],
            [
              'id' => '220',
              'name' => 'Ukraine',
              'status' => 1
            ],
            [
              'id' => '221',
              'name' => 'United Arab Emirates',
              'status' => 1
            ],
            [
              'id' => '222',
              'name' => 'United Kingdom',
              'status' => 1
            ],
            [
              'id' => '223',
              'name' => 'United States',
              'status' => 1
            ],
            [
              'id' => '224',
              'name' => 'United States Minor Outlying Islands',
              'status' => 1
            ],
            [
              'id' => '225',
              'name' => 'Uruguay',
              'status' => 1
            ],
            [
              'id' => '226',
              'name' => 'Uzbekistan',
              'status' => 1
            ],
            [
              'id' => '227',
              'name' => 'Vanuatu',
              'status' => 1
            ],
            [
              'id' => '228',
              'name' => 'Vatican City State (Holy See]',
              'status' => 1
            ],
            [
              'id' => '229',
              'name' => 'Venezuela',
              'status' => 1
            ],
            [
              'id' => '230',
              'name' => 'Viet Nam',
              'status' => 1
            ],
            [
              'id' => '231',
              'name' => 'Virgin Islands (British]',
              'status' => 1
            ],
            [
              'id' => '232',
              'name' => 'Virgin Islands (U.S.]',
              'status' => 1
            ],
            [
              'id' => '233',
              'name' => 'Wallis and Futuna Islands',
              'status' => 1
            ],
            [
              'id' => '234',
              'name' => 'Western Sahara',
              'status' => 1
            ],
            [
              'id' => '235',
              'name' => 'Yemen',
              'status' => 1
            ],
            [
              'id' => '237',
              'name' => 'Democratic Republic of Congo',
              'status' => 1
            ],
            [
              'id' => '238',
              'name' => 'Zambia',
              'status' => 1
            ],
            [
              'id' => '239',
              'name' => 'Zimbabwe',
              'status' => 1
            ],
            [
              'id' => '242',
              'name' => 'Montenegro',
              'status' => 1
            ],
            [
              'id' => '243',
              'name' => 'Serbia',
              'status' => 1
            ],
            [
              'id' => '244',
              'name' => 'Aaland Islands',
              'status' => 1
            ],
            [
              'id' => '245',
              'name' => 'Bonaire, Sint Eustatius and Saba',
              'status' => 1
            ],
            [
              'id' => '246',
              'name' => 'Curacao',
              'status' => 1
            ],
            [
              'id' => '247',
              'name' => 'Palestinian Territory, Occupied',
              'status' => 1
            ],
            [
              'id' => '248',
              'name' => 'South Sudan',
              'status' => 1
            ],
            [
              'id' => '249',
              'name' => 'St. Barthelemy',
              'status' => 1
            ],
            [
              'id' => '250',
              'name' => 'St. Martin (French part]',
              'status' => 1
            ],
            [
              'id' => '251',
              'name' => 'Canary Islands',
              'status' => 1
            ],
            [
              'id' => '252',
              'name' => 'Ascension Island (British]',
              'status' => 1
            ],
            [
              'id' => '253',
              'name' => 'Kosovo, Republic of',
              'status' => 1
            ],
            [
              'id' => '254',
              'name' => 'Isle of Man',
              'status' => 1
            ],
            [
              'id' => '255',
              'name' => 'Tristan da Cunha',
              'status' => 1
            ],
            [
              'id' => '256',
              'name' => 'Guernsey',
              'status' => 1
            ],
            [
              'id' => '257',
              'name' => 'Jersey',
              'status' => 1
            ]
          );

        // Save the Countries
        Country::insert($countries);
    }
}
