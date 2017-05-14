<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170404132317 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(file_get_contents(__DIR__ . '/OMH_DB_V2-0_Sample_Data.sql'));
        $this->addSql('LOCK TABLES `migration_versions` WRITE;');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE TABLE `drug_alternate_names`");

        $this->addSql("TRUNCATE TABLE `drug_ingredients`");

        $this->addSql("TRUNCATE TABLE `drug_interactions`");
        $this->addSql("TRUNCATE TABLE `wada_ingredients`");
        $this->addSql("TRUNCATE TABLE `drug_pdf`");
        $this->addSql("TRUNCATE TABLE `drugs_match`");
        $this->addSql("TRUNCATE TABLE `drug_label`");

        $this->addSql("DELETE FROM `ingredients`");
        $this->addSql("DELETE FROM `ingredient_categories`");
        $this->addSql("DELETE FROM `drugs`");
        $this->addSql("DELETE FROM `drug_types`");
        $this->addSql("DELETE FROM `manufacturers`");
        $this->addSql("DELETE FROM `manufacturer_types`");
        $this->addSql("DELETE FROM `country`");

        $this->addSql("DELETE FROM `interaction_severities`");
        $this->addSql("DELETE FROM `interaction_categories`");

        $this->addSql("DELETE FROM `drug_forms`");
    }
}
