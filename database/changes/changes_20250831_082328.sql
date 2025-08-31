--   2025_08_31_063552_add_slug_column_to_posts_table ..................................................................  
--   ⇂ alter table `posts` add `slug` varchar(255) not null after `title`  
--   ⇂ alter table `posts` add unique `posts_slug_unique`(`slug`)  
ALTER TABLE `posts` ADD `slug` VARCHAR(255) NULL AFTER `title`;


alter table `posts` add unique `posts_slug_unique`(`slug`)  ;

