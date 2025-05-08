<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250508215157 extends AbstractMigration
{
	public function getDescription(): string
	{
		return '';
	}

	public function up(Schema $schema): void
	{
		// this up() migration is auto-generated, please modify it to your needs
		$this->addSql(<<<'SQL'
            CREATE TABLE app_user (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
		$this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON app_user (email)
        SQL);
		$this->addSql(<<<'SQL'
            CREATE TABLE product (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, price INT NOT NULL, slug VARCHAR(255) NOT NULL, image_filename VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
		$this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_D34A04AD989D9B62 ON product (slug)
        SQL);
	}

	public function down(Schema $schema): void
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
		$this->addSql(<<<'SQL'
            DROP TABLE app_user
        SQL);
		$this->addSql(<<<'SQL'
            DROP TABLE product
        SQL);
	}
}
