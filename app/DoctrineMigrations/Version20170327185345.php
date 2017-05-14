<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170327185345 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("
            INSERT INTO `omh_category` VALUES (1, 'Category 1');
            INSERT INTO `omh_category` VALUES (2, 'Category 2');
            INSERT INTO `omh_category` VALUES (3, 'Category 3');
        ");

        $this->addSql("
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (1, 'Medicine 1', 230, 1);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (2, 'Medicine 2', 230, 2);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (3, 'Medicine 3', 230, 3);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (4, 'Medicine 4', 230, 1);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (5, 'Medicine 5', 230, 2);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (6, 'Medicine 6', 230, 3);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (7, 'Medicine 7', 230, 1);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (8, 'Medicine 8', 230, 2);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (9, 'Medicine 9', 230, 3);
            INSERT INTO `omh_medicine` (id,name,country_id,category_id) VALUES (10,'Medicine 10',230, 1);
        ");

        $this->addSql("
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (1,  'Title 1', 'Description 1', 1);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (2,  'Title 2', 'Description 2', 1);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (3,  'Title 3', 'Description 3', 1);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (4,  'Title 1', 'Description 1', 2);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (5,  'Title 2', 'Description 2', 2);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (6,  'Title 3', 'Description 3', 2);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (7,  'Title 1', 'Description 1', 3);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (8,  'Title 2', 'Description 2', 3);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (9,  'Title 3', 'Description 3', 3);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (10, 'Title 1', 'Description 1', 4);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (11, 'Title 2', 'Description 2', 4);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (12, 'Title 3', 'Description 3', 4);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (13, 'Title 1', 'Description 1', 5);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (14, 'Title 2', 'Description 2', 5);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (15, 'Title 3', 'Description 3', 5);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (16, 'Title 1', 'Description 1', 6);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (17, 'Title 2', 'Description 2', 6);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (18, 'Title 3', 'Description 3', 6);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (19, 'Title 1', 'Description 1', 7);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (20, 'Title 2', 'Description 2', 7);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (21, 'Title 3', 'Description 3', 7);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (22, 'Title 1', 'Description 1', 8);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (23, 'Title 2', 'Description 2', 8);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (24, 'Title 3', 'Description 3', 8);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (25, 'Title 1', 'Description 1', 9);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (26, 'Title 2', 'Description 2', 9);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (27, 'Title 3', 'Description 3', 9);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (28, 'Title 1', 'Description 1', 10);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (29, 'Title 2', 'Description 2', 10);
            INSERT INTO `omh_description` (id,title,content,medicine_id) VALUES (30, 'Title 3', 'Description 3', 10);
        ");

        $this->addSql("
            INSERT INTO `omh_ingredient` VALUES (1, 'Ingredient 1');
            INSERT INTO `omh_ingredient` VALUES (2, 'Ingredient 2');
            INSERT INTO `omh_ingredient` VALUES (3, 'Ingredient 3');
            INSERT INTO `omh_ingredient` VALUES (4, 'Ingredient 4');
            INSERT INTO `omh_ingredient` VALUES (5, 'Ingredient 5');
            INSERT INTO `omh_ingredient` VALUES (6, 'Ingredient 6');
            INSERT INTO `omh_ingredient` VALUES (7, 'Ingredient 7');
            INSERT INTO `omh_ingredient` VALUES (8, 'Ingredient 8');
            INSERT INTO `omh_ingredient` VALUES (9, 'Ingredient 9');
            INSERT INTO `omh_ingredient` VALUES (10,'Ingredient 10');
        ");

        $this->addSql("
            INSERT INTO `omh_medicine_ingredient` VALUES (1,  1, 1);
            INSERT INTO `omh_medicine_ingredient` VALUES (2,  1, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (3,  1, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (4,  1, 10);
            INSERT INTO `omh_medicine_ingredient` VALUES (5,  2, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (6,  2, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (7,  2, 6);
            INSERT INTO `omh_medicine_ingredient` VALUES (8,  2, 7);
            INSERT INTO `omh_medicine_ingredient` VALUES (9,  2, 8);
            INSERT INTO `omh_medicine_ingredient` VALUES (10, 3, 9);
            INSERT INTO `omh_medicine_ingredient` VALUES (11, 3, 10);
            INSERT INTO `omh_medicine_ingredient` VALUES (12, 4, 1);
            INSERT INTO `omh_medicine_ingredient` VALUES (13, 4, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (14, 4, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (15, 4, 5);
            INSERT INTO `omh_medicine_ingredient` VALUES (16, 4, 7);
            INSERT INTO `omh_medicine_ingredient` VALUES (17, 4, 9);
            INSERT INTO `omh_medicine_ingredient` VALUES (18, 4, 10);
            INSERT INTO `omh_medicine_ingredient` VALUES (19, 5, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (20, 5, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (21, 5, 4);
            INSERT INTO `omh_medicine_ingredient` VALUES (22, 5, 5);
            INSERT INTO `omh_medicine_ingredient` VALUES (23, 6, 1);
            INSERT INTO `omh_medicine_ingredient` VALUES (24, 6, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (25, 6, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (26, 6, 4);
            INSERT INTO `omh_medicine_ingredient` VALUES (27, 6, 7);
            INSERT INTO `omh_medicine_ingredient` VALUES (28, 6, 8);
            INSERT INTO `omh_medicine_ingredient` VALUES (29, 7, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (30, 7, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (31, 7, 4);
            INSERT INTO `omh_medicine_ingredient` VALUES (32, 7, 7);
            INSERT INTO `omh_medicine_ingredient` VALUES (33, 7, 8);
            INSERT INTO `omh_medicine_ingredient` VALUES (34, 7, 9);
            INSERT INTO `omh_medicine_ingredient` VALUES (35, 7, 10);
            INSERT INTO `omh_medicine_ingredient` VALUES (36, 8, 1);
            INSERT INTO `omh_medicine_ingredient` VALUES (37, 8, 2);
            INSERT INTO `omh_medicine_ingredient` VALUES (38, 8, 4);
            INSERT INTO `omh_medicine_ingredient` VALUES (39, 8, 5);
            INSERT INTO `omh_medicine_ingredient` VALUES (40, 8, 6);
            INSERT INTO `omh_medicine_ingredient` VALUES (41, 8, 7);
            INSERT INTO `omh_medicine_ingredient` VALUES (42, 8, 8);
            INSERT INTO `omh_medicine_ingredient` VALUES (43, 8, 9);
            INSERT INTO `omh_medicine_ingredient` VALUES (44, 9, 3);
            INSERT INTO `omh_medicine_ingredient` VALUES (45, 9, 9);
            INSERT INTO `omh_medicine_ingredient` VALUES (46, 10,2);
            INSERT INTO `omh_medicine_ingredient` VALUES (47, 10,4);
            INSERT INTO `omh_medicine_ingredient` VALUES (48, 10,6);
            INSERT INTO `omh_medicine_ingredient` VALUES (49, 10,8);
            INSERT INTO `omh_medicine_ingredient` VALUES (50, 10,10);
        ");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM `omh_ingredient`");
        $this->addSql("DELETE FROM `omh_medicine_ingredient`");
        $this->addSql("DELETE FROM `omh_user_medicine`");
        $this->addSql("TRUNCATE TABLE `omh_description`");
        $this->addSql("DELETE FROM `omh_medicine`");
        $this->addSql("DELETE FROM `omh_category`");
    }
}
