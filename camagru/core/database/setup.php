#!/usr/bin/php
<?php
include 'database.php';
include 'db_functions.php';
 // CREATE TABLE USERS
if (!mysqlTableExists($dsn, $user, $password, 'users')){
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `users` (
    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(40) NULL,
    `email` VARCHAR(255) NULL,
    `password` VARCHAR(32) NULL,
    `screenName` VARCHAR(40) NULL,
    `profileImage` VARCHAR(255) NOT NULL,
    `profileCover` VARCHAR(255) NOT NULL,
    `following` INT NOT NULL DEFAULT '0',
    `followers` INT NOT NULL DEFAULT '0',
    `bio` VARCHAR(140) NULL,
    `country` VARCHAR(255) NULL,
    `website` VARCHAR(255) NULL,
    `verified` INT NOT NULL DEFAULT '0',
    `verification_code` VARCHAR(264) NULL,
    `passwordChange_code` VARCHAR(264) NULL
    )";
    $pdo->exec($sql);
}


// CREATE TABLE TWEETS
if (!mysqlTableExists($dsn, $user, $password, 'tweets')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `tweets` (
    `tweetID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `status` VARCHAR(140) NULL,
    `tweetBy` INT NOT NULL DEFAULT '0',
    `retweetID` INT NOT NULL DEFAULT '0',
    `retweetBy` INT NOT NULL DEFAULT '0',
    `tweetImage` VARCHAR(255) NULL,
    `likesCount` INT NOT NULL DEFAULT '0',
    `retweetCount` INT NOT NULL DEFAULT '0',
    `postedOn` DATETIME NOT NULL,
    `retweetMsg` VARCHAR(140) NULL
    )";
    $pdo->exec($sql);
}

// CREATE TABLE TRENDS
if (!mysqlTableExists($dsn, $user, $password, 'trends')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `trends` (
    `trendID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `hashtag` VARCHAR(140) NULL,
    `createdOn` DATETIME NOT NULL,
    UNIQUE (hashtag)
    )";
    $pdo->exec($sql);
}

// CREATE TABLE NOTIFICATION
if (!mysqlTableExists($dsn, $user, $password, 'notification')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `notification` (
    `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `notificationFor` INT NOT NULL DEFAULT '0',
    `notificationFrom` INT NOT NULL DEFAULT '0',
    `target` INT NOT NULL DEFAULT '0',
    `type` ENUM ('follow','retweet', 'like', 'mention'),
    `time` DATETIME NOT NULL,
    `status` INT NOT NULL DEFAULT '0'
    )";
    $pdo->exec($sql);
}

// CREATE TABLE MESSAGES
if (!mysqlTableExists($dsn, $user, $password, 'messages')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `messages` (
    `messageID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `message` TEXT NOT NULL,
    `messageTo` INT NOT NULL DEFAULT '0',
    `messageFrom` INT NOT NULL DEFAULT '0',
    `messageOn` DATETIME NOT NULL,
    `status` INT NOT NULL DEFAULT '0'
    )";
$pdo->exec($sql);
}

// CREATE TABLE LIKES
if (!mysqlTableExists($dsn, $user, $password, 'likes')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `likes` (
    `likeID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `likeBy` INT NOT NULL DEFAULT '0',
    `likeOn` INT NOT NULL DEFAULT '0'
    )";
    $pdo->exec($sql);
}

// CREATE TABLE FOLLOW
if (!mysqlTableExists($dsn, $user, $password, 'follow')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `follow` (
        `followID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `sender` INT NOT NULL DEFAULT '0',
        `receiver` INT NOT NULL DEFAULT '0'
    )";
    $pdo->exec($sql);
}

// CREATE TABLE COMMENTS
if (!mysqlTableExists($dsn, $user, $password, 'comments')){
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `comments` (
        `commentID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `comment` VARCHAR(140) NULL,
        `commentOn` INT NOT NULL DEFAULT '0',
        `commentBy` INT NOT NULL DEFAULT '0',
        `commentAt` INT NOT NULL DEFAULT '0'
    )";
    $pdo->exec($sql);
}
?>
