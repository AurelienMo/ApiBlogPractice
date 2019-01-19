<?php

declare(strict_types=1);

namespace App\Domains\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190119094806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE amo_article (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', amo_owner_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_4E4E09D3C57B52FD (amo_owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amo_comment (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', amo_author_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', amo_article_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D80055D9F1A37031 (amo_author_id), INDEX IDX_D80055D9A92899C9 (amo_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amo_user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE amo_article ADD CONSTRAINT FK_4E4E09D3C57B52FD FOREIGN KEY (amo_owner_id) REFERENCES amo_user (id)');
        $this->addSql('ALTER TABLE amo_comment ADD CONSTRAINT FK_D80055D9F1A37031 FOREIGN KEY (amo_author_id) REFERENCES amo_user (id)');
        $this->addSql('ALTER TABLE amo_comment ADD CONSTRAINT FK_D80055D9A92899C9 FOREIGN KEY (amo_article_id) REFERENCES amo_article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE amo_comment DROP FOREIGN KEY FK_D80055D9A92899C9');
        $this->addSql('ALTER TABLE amo_article DROP FOREIGN KEY FK_4E4E09D3C57B52FD');
        $this->addSql('ALTER TABLE amo_comment DROP FOREIGN KEY FK_D80055D9F1A37031');
        $this->addSql('DROP TABLE amo_article');
        $this->addSql('DROP TABLE amo_comment');
        $this->addSql('DROP TABLE amo_user');
    }
}
