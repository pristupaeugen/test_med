<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170309182456 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("
            INSERT INTO `omh_country` VALUES (null, 'AF', 'Afghanistan');
            INSERT INTO `omh_country` VALUES (null, 'AL', 'Albania');
            INSERT INTO `omh_country` VALUES (null, 'DZ', 'Algeria');
            INSERT INTO `omh_country` VALUES (null, 'DS', 'American Samoa');
            INSERT INTO `omh_country` VALUES (null, 'AD', 'Andorra');
            INSERT INTO `omh_country` VALUES (null, 'AO', 'Angola');
            INSERT INTO `omh_country` VALUES (null, 'AI', 'Anguilla');
            INSERT INTO `omh_country` VALUES (null, 'AQ', 'Antarctica');
            INSERT INTO `omh_country` VALUES (null, 'AG', 'Antigua and Barbuda');
            INSERT INTO `omh_country` VALUES (null, 'AR', 'Argentina');
            INSERT INTO `omh_country` VALUES (null, 'AM', 'Armenia');
            INSERT INTO `omh_country` VALUES (null, 'AW', 'Aruba');
            INSERT INTO `omh_country` VALUES (null, 'AU', 'Australia');
            INSERT INTO `omh_country` VALUES (null, 'AT', 'Austria');
            INSERT INTO `omh_country` VALUES (null, 'AZ', 'Azerbaijan');
            INSERT INTO `omh_country` VALUES (null, 'BS', 'Bahamas');
            INSERT INTO `omh_country` VALUES (null, 'BH', 'Bahrain');
            INSERT INTO `omh_country` VALUES (null, 'BD', 'Bangladesh');
            INSERT INTO `omh_country` VALUES (null, 'BB', 'Barbados');
            INSERT INTO `omh_country` VALUES (null, 'BY', 'Belarus');
            INSERT INTO `omh_country` VALUES (null, 'BE', 'Belgium');
            INSERT INTO `omh_country` VALUES (null, 'BZ', 'Belize');
            INSERT INTO `omh_country` VALUES (null, 'BJ', 'Benin');
            INSERT INTO `omh_country` VALUES (null, 'BM', 'Bermuda');
            INSERT INTO `omh_country` VALUES (null, 'BT', 'Bhutan');
            INSERT INTO `omh_country` VALUES (null, 'BO', 'Bolivia');
            INSERT INTO `omh_country` VALUES (null, 'BA', 'Bosnia and Herzegovina');
            INSERT INTO `omh_country` VALUES (null, 'BW', 'Botswana');
            INSERT INTO `omh_country` VALUES (null, 'BV', 'Bouvet Island');
            INSERT INTO `omh_country` VALUES (null, 'BR', 'Brazil');
            INSERT INTO `omh_country` VALUES (null, 'IO', 'British Indian Ocean Territory');
            INSERT INTO `omh_country` VALUES (null, 'BN', 'Brunei Darussalam');
            INSERT INTO `omh_country` VALUES (null, 'BG', 'Bulgaria');
            INSERT INTO `omh_country` VALUES (null, 'BF', 'Burkina Faso');
            INSERT INTO `omh_country` VALUES (null, 'BI', 'Burundi');
            INSERT INTO `omh_country` VALUES (null, 'KH', 'Cambodia');
            INSERT INTO `omh_country` VALUES (null, 'CM', 'Cameroon');
            INSERT INTO `omh_country` VALUES (null, 'CA', 'Canada');
            INSERT INTO `omh_country` VALUES (null, 'CV', 'Cape Verde');
            INSERT INTO `omh_country` VALUES (null, 'KY', 'Cayman Islands');
            INSERT INTO `omh_country` VALUES (null, 'CF', 'Central African Republic');
            INSERT INTO `omh_country` VALUES (null, 'TD', 'Chad');
            INSERT INTO `omh_country` VALUES (null, 'CL', 'Chile');
            INSERT INTO `omh_country` VALUES (null, 'CN', 'China');
            INSERT INTO `omh_country` VALUES (null, 'CX', 'Christmas Island');
            INSERT INTO `omh_country` VALUES (null, 'CC', 'Cocos (Keeling) Islands');
            INSERT INTO `omh_country` VALUES (null, 'CO', 'Colombia');
            INSERT INTO `omh_country` VALUES (null, 'KM', 'Comoros');
            INSERT INTO `omh_country` VALUES (null, 'CG', 'Congo');
            INSERT INTO `omh_country` VALUES (null, 'CK', 'Cook Islands');
            INSERT INTO `omh_country` VALUES (null, 'CR', 'Costa Rica');
            INSERT INTO `omh_country` VALUES (null, 'HR', 'Croatia (Hrvatska)');
            INSERT INTO `omh_country` VALUES (null, 'CU', 'Cuba');
            INSERT INTO `omh_country` VALUES (null, 'CY', 'Cyprus');
            INSERT INTO `omh_country` VALUES (null, 'CZ', 'Czech Republic');
            INSERT INTO `omh_country` VALUES (null, 'DK', 'Denmark');
            INSERT INTO `omh_country` VALUES (null, 'DJ', 'Djibouti');
            INSERT INTO `omh_country` VALUES (null, 'DM', 'Dominica');
            INSERT INTO `omh_country` VALUES (null, 'DO', 'Dominican Republic');
            INSERT INTO `omh_country` VALUES (null, 'TP', 'East Timor');
            INSERT INTO `omh_country` VALUES (null, 'EC', 'Ecuador');
            INSERT INTO `omh_country` VALUES (null, 'EG', 'Egypt');
            INSERT INTO `omh_country` VALUES (null, 'SV', 'El Salvador');
            INSERT INTO `omh_country` VALUES (null, 'GQ', 'Equatorial Guinea');
            INSERT INTO `omh_country` VALUES (null, 'ER', 'Eritrea');
            INSERT INTO `omh_country` VALUES (null, 'EE', 'Estonia');
            INSERT INTO `omh_country` VALUES (null, 'ET', 'Ethiopia');
            INSERT INTO `omh_country` VALUES (null, 'FK', 'Falkland Islands (Malvinas)');
            INSERT INTO `omh_country` VALUES (null, 'FO', 'Faroe Islands');
            INSERT INTO `omh_country` VALUES (null, 'FJ', 'Fiji');
            INSERT INTO `omh_country` VALUES (null, 'FI', 'Finland');
            INSERT INTO `omh_country` VALUES (null, 'FR', 'France');
            INSERT INTO `omh_country` VALUES (null, 'FX', 'France, Metropolitan');
            INSERT INTO `omh_country` VALUES (null, 'GF', 'French Guiana');
            INSERT INTO `omh_country` VALUES (null, 'PF', 'French Polynesia');
            INSERT INTO `omh_country` VALUES (null, 'TF', 'French Southern Territories');
            INSERT INTO `omh_country` VALUES (null, 'GA', 'Gabon');
            INSERT INTO `omh_country` VALUES (null, 'GM', 'Gambia');
            INSERT INTO `omh_country` VALUES (null, 'GE', 'Georgia');
            INSERT INTO `omh_country` VALUES (null, 'DE', 'Germany');
            INSERT INTO `omh_country` VALUES (null, 'GH', 'Ghana');
            INSERT INTO `omh_country` VALUES (null, 'GI', 'Gibraltar');
            INSERT INTO `omh_country` VALUES (null, 'GK', 'Guernsey');
            INSERT INTO `omh_country` VALUES (null, 'GR', 'Greece');
            INSERT INTO `omh_country` VALUES (null, 'GL', 'Greenland');
            INSERT INTO `omh_country` VALUES (null, 'GD', 'Grenada');
            INSERT INTO `omh_country` VALUES (null, 'GP', 'Guadeloupe');
            INSERT INTO `omh_country` VALUES (null, 'GU', 'Guam');
            INSERT INTO `omh_country` VALUES (null, 'GT', 'Guatemala');
            INSERT INTO `omh_country` VALUES (null, 'GN', 'Guinea');
            INSERT INTO `omh_country` VALUES (null, 'GW', 'Guinea-Bissau');
            INSERT INTO `omh_country` VALUES (null, 'GY', 'Guyana');
            INSERT INTO `omh_country` VALUES (null, 'HT', 'Haiti');
            INSERT INTO `omh_country` VALUES (null, 'HM', 'Heard and Mc Donald Islands');
            INSERT INTO `omh_country` VALUES (null, 'HN', 'Honduras');
            INSERT INTO `omh_country` VALUES (null, 'HK', 'Hong Kong');
            INSERT INTO `omh_country` VALUES (null, 'HU', 'Hungary');
            INSERT INTO `omh_country` VALUES (null, 'IS', 'Iceland');
            INSERT INTO `omh_country` VALUES (null, 'IN', 'India');
            INSERT INTO `omh_country` VALUES (null, 'IM', 'Isle of Man');
            INSERT INTO `omh_country` VALUES (null, 'ID', 'Indonesia');
            INSERT INTO `omh_country` VALUES (null, 'IR', 'Iran (Islamic Republic of)');
            INSERT INTO `omh_country` VALUES (null, 'IQ', 'Iraq');
            INSERT INTO `omh_country` VALUES (null, 'IE', 'Ireland');
            INSERT INTO `omh_country` VALUES (null, 'IL', 'Israel');
            INSERT INTO `omh_country` VALUES (null, 'IT', 'Italy');
            INSERT INTO `omh_country` VALUES (null, 'CI', 'Ivory Coast');
            INSERT INTO `omh_country` VALUES (null, 'JE', 'Jersey');
            INSERT INTO `omh_country` VALUES (null, 'JM', 'Jamaica');
            INSERT INTO `omh_country` VALUES (null, 'JP', 'Japan');
            INSERT INTO `omh_country` VALUES (null, 'JO', 'Jordan');
            INSERT INTO `omh_country` VALUES (null, 'KZ', 'Kazakhstan');
            INSERT INTO `omh_country` VALUES (null, 'KE', 'Kenya');
            INSERT INTO `omh_country` VALUES (null, 'KI', 'Kiribati');
            INSERT INTO `omh_country` VALUES (null, 'KP', 'Korea, Democratic People''s Republic of');
            INSERT INTO `omh_country` VALUES (null, 'KR', 'Korea, Republic of');
            INSERT INTO `omh_country` VALUES (null, 'XK', 'Kosovo');
            INSERT INTO `omh_country` VALUES (null, 'KW', 'Kuwait');
            INSERT INTO `omh_country` VALUES (null, 'KG', 'Kyrgyzstan');
            INSERT INTO `omh_country` VALUES (null, 'LA', 'Lao People''s Democratic Republic');
            INSERT INTO `omh_country` VALUES (null, 'LV', 'Latvia');
            INSERT INTO `omh_country` VALUES (null, 'LB', 'Lebanon');
            INSERT INTO `omh_country` VALUES (null, 'LS', 'Lesotho');
            INSERT INTO `omh_country` VALUES (null, 'LR', 'Liberia');
            INSERT INTO `omh_country` VALUES (null, 'LY', 'Libyan Arab Jamahiriya');
            INSERT INTO `omh_country` VALUES (null, 'LI', 'Liechtenstein');
            INSERT INTO `omh_country` VALUES (null, 'LT', 'Lithuania');
            INSERT INTO `omh_country` VALUES (null, 'LU', 'Luxembourg');
            INSERT INTO `omh_country` VALUES (null, 'MO', 'Macau');
            INSERT INTO `omh_country` VALUES (null, 'MK', 'Macedonia');
            INSERT INTO `omh_country` VALUES (null, 'MG', 'Madagascar');
            INSERT INTO `omh_country` VALUES (null, 'MW', 'Malawi');
            INSERT INTO `omh_country` VALUES (null, 'MY', 'Malaysia');
            INSERT INTO `omh_country` VALUES (null, 'MV', 'Maldives');
            INSERT INTO `omh_country` VALUES (null, 'ML', 'Mali');
            INSERT INTO `omh_country` VALUES (null, 'MT', 'Malta');
            INSERT INTO `omh_country` VALUES (null, 'MH', 'Marshall Islands');
            INSERT INTO `omh_country` VALUES (null, 'MQ', 'Martinique');
            INSERT INTO `omh_country` VALUES (null, 'MR', 'Mauritania');
            INSERT INTO `omh_country` VALUES (null, 'MU', 'Mauritius');
            INSERT INTO `omh_country` VALUES (null, 'TY', 'Mayotte');
            INSERT INTO `omh_country` VALUES (null, 'MX', 'Mexico');
            INSERT INTO `omh_country` VALUES (null, 'FM', 'Micronesia, Federated States of');
            INSERT INTO `omh_country` VALUES (null, 'MD', 'Moldova, Republic of');
            INSERT INTO `omh_country` VALUES (null, 'MC', 'Monaco');
            INSERT INTO `omh_country` VALUES (null, 'MN', 'Mongolia');
            INSERT INTO `omh_country` VALUES (null, 'ME', 'Montenegro');
            INSERT INTO `omh_country` VALUES (null, 'MS', 'Montserrat');
            INSERT INTO `omh_country` VALUES (null, 'MA', 'Morocco');
            INSERT INTO `omh_country` VALUES (null, 'MZ', 'Mozambique');
            INSERT INTO `omh_country` VALUES (null, 'MM', 'Myanmar');
            INSERT INTO `omh_country` VALUES (null, 'NA', 'Namibia');
            INSERT INTO `omh_country` VALUES (null, 'NR', 'Nauru');
            INSERT INTO `omh_country` VALUES (null, 'NP', 'Nepal');
            INSERT INTO `omh_country` VALUES (null, 'NL', 'Netherlands');
            INSERT INTO `omh_country` VALUES (null, 'AN', 'Netherlands Antilles');
            INSERT INTO `omh_country` VALUES (null, 'NC', 'New Caledonia');
            INSERT INTO `omh_country` VALUES (null, 'NZ', 'New Zealand');
            INSERT INTO `omh_country` VALUES (null, 'NI', 'Nicaragua');
            INSERT INTO `omh_country` VALUES (null, 'NE', 'Niger');
            INSERT INTO `omh_country` VALUES (null, 'NG', 'Nigeria');
            INSERT INTO `omh_country` VALUES (null, 'NU', 'Niue');
            INSERT INTO `omh_country` VALUES (null, 'NF', 'Norfolk Island');
            INSERT INTO `omh_country` VALUES (null, 'MP', 'Northern Mariana Islands');
            INSERT INTO `omh_country` VALUES (null, 'NO', 'Norway');
            INSERT INTO `omh_country` VALUES (null, 'OM', 'Oman');
            INSERT INTO `omh_country` VALUES (null, 'PK', 'Pakistan');
            INSERT INTO `omh_country` VALUES (null, 'PW', 'Palau');
            INSERT INTO `omh_country` VALUES (null, 'PS', 'Palestine');
            INSERT INTO `omh_country` VALUES (null, 'PA', 'Panama');
            INSERT INTO `omh_country` VALUES (null, 'PG', 'Papua New Guinea');
            INSERT INTO `omh_country` VALUES (null, 'PY', 'Paraguay');
            INSERT INTO `omh_country` VALUES (null, 'PE', 'Peru');
            INSERT INTO `omh_country` VALUES (null, 'PH', 'Philippines');
            INSERT INTO `omh_country` VALUES (null, 'PN', 'Pitcairn');
            INSERT INTO `omh_country` VALUES (null, 'PL', 'Poland');
            INSERT INTO `omh_country` VALUES (null, 'PT', 'Portugal');
            INSERT INTO `omh_country` VALUES (null, 'PR', 'Puerto Rico');
            INSERT INTO `omh_country` VALUES (null, 'QA', 'Qatar');
            INSERT INTO `omh_country` VALUES (null, 'RE', 'Reunion');
            INSERT INTO `omh_country` VALUES (null, 'RO', 'Romania');
            INSERT INTO `omh_country` VALUES (null, 'RU', 'Russian Federation');
            INSERT INTO `omh_country` VALUES (null, 'RW', 'Rwanda');
            INSERT INTO `omh_country` VALUES (null, 'KN', 'Saint Kitts and Nevis');
            INSERT INTO `omh_country` VALUES (null, 'LC', 'Saint Lucia');
            INSERT INTO `omh_country` VALUES (null, 'VC', 'Saint Vincent and the Grenadines');
            INSERT INTO `omh_country` VALUES (null, 'WS', 'Samoa');
            INSERT INTO `omh_country` VALUES (null, 'SM', 'San Marino');
            INSERT INTO `omh_country` VALUES (null, 'ST', 'Sao Tome and Principe');
            INSERT INTO `omh_country` VALUES (null, 'SA', 'Saudi Arabia');
            INSERT INTO `omh_country` VALUES (null, 'SN', 'Senegal');
            INSERT INTO `omh_country` VALUES (null, 'RS', 'Serbia');
            INSERT INTO `omh_country` VALUES (null, 'SC', 'Seychelles');
            INSERT INTO `omh_country` VALUES (null, 'SL', 'Sierra Leone');
            INSERT INTO `omh_country` VALUES (null, 'SG', 'Singapore');
            INSERT INTO `omh_country` VALUES (null, 'SK', 'Slovakia');
            INSERT INTO `omh_country` VALUES (null, 'SI', 'Slovenia');
            INSERT INTO `omh_country` VALUES (null, 'SB', 'Solomon Islands');
            INSERT INTO `omh_country` VALUES (null, 'SO', 'Somalia');
            INSERT INTO `omh_country` VALUES (null, 'ZA', 'South Africa');
            INSERT INTO `omh_country` VALUES (null, 'GS', 'South Georgia South Sandwich Islands');
            INSERT INTO `omh_country` VALUES (null, 'ES', 'Spain');
            INSERT INTO `omh_country` VALUES (null, 'LK', 'Sri Lanka');
            INSERT INTO `omh_country` VALUES (null, 'SH', 'St. Helena');
            INSERT INTO `omh_country` VALUES (null, 'PM', 'St. Pierre and Miquelon');
            INSERT INTO `omh_country` VALUES (null, 'SD', 'Sudan');
            INSERT INTO `omh_country` VALUES (null, 'SR', 'Suriname');
            INSERT INTO `omh_country` VALUES (null, 'SJ', 'Svalbard and Jan Mayen Islands');
            INSERT INTO `omh_country` VALUES (null, 'SZ', 'Swaziland');
            INSERT INTO `omh_country` VALUES (null, 'SE', 'Sweden');
            INSERT INTO `omh_country` VALUES (null, 'CH', 'Switzerland');
            INSERT INTO `omh_country` VALUES (null, 'SY', 'Syrian Arab Republic');
            INSERT INTO `omh_country` VALUES (null, 'TW', 'Taiwan');
            INSERT INTO `omh_country` VALUES (null, 'TJ', 'Tajikistan');
            INSERT INTO `omh_country` VALUES (null, 'TZ', 'Tanzania, United Republic of');
            INSERT INTO `omh_country` VALUES (null, 'TH', 'Thailand');
            INSERT INTO `omh_country` VALUES (null, 'TG', 'Togo');
            INSERT INTO `omh_country` VALUES (null, 'TK', 'Tokelau');
            INSERT INTO `omh_country` VALUES (null, 'TO', 'Tonga');
            INSERT INTO `omh_country` VALUES (null, 'TT', 'Trinidad and Tobago');
            INSERT INTO `omh_country` VALUES (null, 'TN', 'Tunisia');
            INSERT INTO `omh_country` VALUES (null, 'TR', 'Turkey');
            INSERT INTO `omh_country` VALUES (null, 'TM', 'Turkmenistan');
            INSERT INTO `omh_country` VALUES (null, 'TC', 'Turks and Caicos Islands');
            INSERT INTO `omh_country` VALUES (null, 'TV', 'Tuvalu');
            INSERT INTO `omh_country` VALUES (null, 'UG', 'Uganda');
            INSERT INTO `omh_country` VALUES (null, 'UA', 'Ukraine');
            INSERT INTO `omh_country` VALUES (null, 'AE', 'United Arab Emirates');
            INSERT INTO `omh_country` VALUES (null, 'GB', 'United Kingdom');
            INSERT INTO `omh_country` VALUES (null, 'US', 'United States');
            INSERT INTO `omh_country` VALUES (null, 'UM', 'United States minor outlying islands');
            INSERT INTO `omh_country` VALUES (null, 'UY', 'Uruguay');
            INSERT INTO `omh_country` VALUES (null, 'UZ', 'Uzbekistan');
            INSERT INTO `omh_country` VALUES (null, 'VU', 'Vanuatu');
            INSERT INTO `omh_country` VALUES (null, 'VA', 'Vatican City State');
            INSERT INTO `omh_country` VALUES (null, 'VE', 'Venezuela');
            INSERT INTO `omh_country` VALUES (null, 'VN', 'Vietnam');
            INSERT INTO `omh_country` VALUES (null, 'VG', 'Virgin Islands (British)');
            INSERT INTO `omh_country` VALUES (null, 'VI', 'Virgin Islands (U.S.)');
            INSERT INTO `omh_country` VALUES (null, 'WF', 'Wallis and Futuna Islands');
            INSERT INTO `omh_country` VALUES (null, 'EH', 'Western Sahara');
            INSERT INTO `omh_country` VALUES (null, 'YE', 'Yemen');
            INSERT INTO `omh_country` VALUES (null, 'YU', 'Yugoslavia');
            INSERT INTO `omh_country` VALUES (null, 'ZR', 'Zaire');
            INSERT INTO `omh_country` VALUES (null, 'ZM', 'Zambia');
            INSERT INTO `omh_country` VALUES (null, 'ZW', 'Zimbabwe');
        ");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE TABLE `omh_country`");
    }
}
