CREATE TABLE `user` (
    `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(191) NOT NULL,
    `phone` VARCHAR(191) NOT NULL,
    `email` VARCHAR(191) NOT NULL,
    `password` VARCHAR(191) NOT NULL,
    CONSTRAINT user_email_password_uk UNIQUE(email, password),
    CONSTRAINT user_id_pk PRIMARY KEY(id)
);

CREATE TABLE `administrator`(
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
	`user_id` INT UNSIGNED NOT NULL,
   CONSTRAINT administrator_id_pk PRIMARY KEY(id),
   CONSTRAINT administrator_user_id_fk FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `user`(`name`, `phone`, `email`, `password`) VALUES ('james', '403-483-7500','aberefajames@yahoo.com','password');

INSERT INTO `administrator`(`user_id`) VALUES (1);

CREATE TABLE `researcher`(
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
	`user_id` INT UNSIGNED NOT NULL,
   CONSTRAINT researcher_id_pk PRIMARY KEY(id),
   CONSTRAINT researcher_user_id_fk FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `reviewer`(
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
	`user_id` INT UNSIGNED NOT NULL,
   CONSTRAINT reviewer_id_pk PRIMARY KEY(id),
   CONSTRAINT reviewer_user_id_fk FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `editor`(
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
	`user_id` INT UNSIGNED NOT NULL,
   CONSTRAINT editor_id_pk PRIMARY KEY(id),
   CONSTRAINT editor_user_id_fk FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `paper`(
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
  `researcher_id` INT UNSIGNED NOT NULL,
  `status`ENUM('WAITING','PUBLISHED','WITHDRAWN') DEFAULT 'WAITING',
	`title` VARCHAR(191) NOT NULL,
  `author` VARCHAR(191) NOT NULL,
  `article` TEXT NOT NULL,
   CONSTRAINT paper_id_pk PRIMARY KEY(id),
   CONSTRAINT paper_researcher_id_fk FOREIGN KEY (researcher_id) REFERENCES researcher(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `paper_editor`(
  `paper_id` INT UNSIGNED NOT NULL,
	`editor_id` INT UNSIGNED NOT NULL,
   CONSTRAINT paper_editor_paper_id_fk FOREIGN KEY (paper_id) REFERENCES paper(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT paper_editor_editor_id_fk FOREIGN KEY (editor_id) REFERENCES editor(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT paper_editor_pk PRIMARY KEY(paper_id, editor_id)
);

CREATE TABLE `paper_reviewer`(
  `paper_id` INT UNSIGNED NOT NULL,
  `revision_deadline` DATE NOT NULL,
	`reviewer_id` INT UNSIGNED NOT NULL,
   CONSTRAINT paper_reviewer_paper_id_fk FOREIGN KEY (paper_id) REFERENCES paper(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT paper_reviewer_reviewer_id_fk FOREIGN KEY (reviewer_id) REFERENCES reviewer(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT paper_editor_pk PRIMARY KEY(paper_id, reviewer_id)
);

CREATE TABLE `comment`(
  `paper_id` INT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
	`comment` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   CONSTRAINT comment_paper_id_fk FOREIGN KEY (paper_id) REFERENCES paper(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT comment_user_id_fk FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `researcher_editor_withdrawal`(
  `paper_id` INT UNSIGNED NOT NULL,
	`editor_id` INT UNSIGNED NOT NULL,
  `researcher_id` INT UNSIGNED NOT NULL,
  `status` ENUM('WAITING','APPROVED','REJECTED') DEFAULT 'WAITING',
  `researcher_comment` TEXT NOT NULL,
  `editor_comment` TEXT,
   CONSTRAINT researcher_editor_withdrawal_paper_id_fk FOREIGN KEY (paper_id) REFERENCES paper(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT researcher_editor_withdrawal_editor_id_fk FOREIGN KEY (editor_id) REFERENCES editor(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT researcher_editor_withdrawal_researcher_id_fk FOREIGN KEY (researcher_id) REFERENCES researcher(id) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT researcher_editor_withdrawal_pk PRIMARY KEY(paper_id, editor_id, researcher_id)
);
