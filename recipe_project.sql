-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2018 at 09:54 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_project`
--

CREATE DATABASE recipe_project
CHARACTER SET latin1
COLLATE latin1_general_ci;

USE recipe_project

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_description` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_description`, `rating`, `recipe_id`, `ownerid`, `date`) VALUES
(1, 'An absolutely amazing dish, my kids love it!! Definitely will make it again. :)', 5, 14, 1, '2018-05-24 07:48:59'),
(2, 'A simple yet delicious dish! However, I felt like it was a tad too sweet. Other than that, good job!', 4, 13, 1, '2018-05-24 07:51:00'),
(3, 'Its so gooood! ', 3, 10, 3, '2018-05-24 07:53:21'),
(4, 'Very tasty indeed! I&#39;ve been cooking Japanese dishes for a while now and this one has become one of my favorites!! ', 5, 13, 3, '2018-05-24 07:53:41'),
(5, 'Oh my god this has got to be the best dessert on earth!!! For a novice baker like me, this recipe is so easy to make and taste so good!!!', 5, 12, 3, '2018-05-24 07:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `rid` int(11) NOT NULL,
  `stepNum` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`rid`, `stepNum`, `description`) VALUES
(1, 1, 'Boil the noodles over medium-high heat for 10 minutes. Drain.'),
(1, 2, 'Heat 1 teaspoon oil in a wok over high heat until just smoking. Stir-fry half the chicken for 3 minutes or until cooked through. Transfer to a plate. Repeat with the remaining chicken.'),
(1, 3, '\r\nHeat remaining oil in the wok over medium heat. Stir-fry carrot and shallot for 1 minute. Add snow peas and pad Thai paste. Stir-fry for 1 minute or until vegetables are tender crisp. Make a well in the centre. Add egg. Stir-fry for 1 minute or until egg is almost cooked. Add noodles and chicken. Stir-fry for 1 minute or until combined. Top with the bean sprouts, coriander and peanuts.'),
(9, 1, 'Heat half the oil in a large saucepan over high heat. Add half the chicken. Cook, turning occasionally, for 3 mins or until golden all over. Transfer to a bowl. Repeat with remaining chicken.'),
(9, 2, 'Heat remaining oil in the pan. Add the onion and ginger and cook, stirring, for 5 mins or until onion softens. Add the curry paste and cook for 1 min or until fragrant.'),
(9, 3, 'Add the cauliflower, chicken and rice. Stir to combine. Pour over the stock and bring to the boil. Reduce heat to low and cook, covered, for 12 mins or until liquid is almost absorbed. Scatter the peas over the rice and cook for 3 mins or until liquid is absorbed and rice is tender. Set aside, covered, for 5 mins to rest.'),
(9, 4, 'Add cashews and use a fork to stir through with the peas. Divide among serving bowls. Top with coriander.'),
(10, 1, 'Combine the kimchi, hot pepper paste, kimchi juice, pork, and sugar in a heavy bottomed pot.'),
(10, 2, 'Add water and bring to a boil over high heat and cook for 30 minutes.'),
(10, 3, 'Add tofu and lower the heat to medium low. Cook for another 10 minutes.'),
(10, 4, 'Add green onion and remove from the heat.'),
(10, 5, 'Serve hot with rice and size dishes if desired.'),
(11, 1, 'Make Thai-style marinade: Combine kecap manis, sugar, garlic, ginger, lemongrass, lime juice, sweet chilli sauce, kaffir lime leaves and fish sauce in a jug.'),
(11, 2, 'Cut fish into quarters. Cut calamari in half. Score inside flesh and cut into 3cm-wide pieces. Place seafood in a large bowl. Pour over marinade. Toss to coat. Refrigerate for 4 hours.'),
(11, 3, '\r\nDrain seafood from marinade. Heat a barbecue chargrill or chargrill pan over medium heat. Cook blue-eye, for 3 to 4 minutes each side or until browned and cooked through. Transfer to a plate. Cover. Cook salmon, prawns and calamari for 2 to 3 minutes each side or until salmon is just cooked through, prawns have turned pink in colour and calamari is cooked through.'),
(11, 4, 'Serve with steamed jasmine rice and barbecued lime halves.'),
(12, 1, 'Preheat oven to 170C/150C fan-forced. Grease a 6cm-deep, 22cm round springform pan. Line base and side with 2 layers of baking paper.'),
(12, 2, 'Place butter and chocolate in a saucepan over medium heat. Cook, stirring occasionally, for 10 minutes or until mixture is smooth and combined. Remove from heat. Stand for 5 minutes.'),
(12, 3, 'Using an electric mixer, beat yolks, sugar and vanilla for 5 to 6 minutes or until thick and creamy. Gradually beat in chocolate mixture until combined. Add cocoa, flour, milk powder and almond meal. Beat on low speed until just combined.'),
(12, 4, 'In a separate bowl, beat egg whites until just-firm peaks form. Fold 1/2 the egg white into the chocolate mixture (chocolate mixture will be quite thick at this stage). Fold in remaining egg white. Pour mixture into prepared pan. Place on a baking tray. Bake for 45 to 50 minutes or until cake is just firm to touch. Cool completely in pan.'),
(12, 5, 'Make Salted Caramel Sauce: Place sugar, butter and cream in a saucepan over medium heat. Cook, stirring occasionally, for 5 minutes or until the sugar is dissolved and mixture is combined. Bring to a simmer. Simmer for 2 minutes. Remove from heat. Stir in salt. Drizzle cake with 1/2 the sauce. Sprinkle with extra sea salt. Serve with remaining sauce and cream or ice-cream.'),
(13, 1, 'Heat oil in a large deep frying pan over medium-high heat. Cook chicken for 5 minutes or until browned all over. Transfer to a plate.'),
(13, 2, 'Melt butter in same pan over medium-high heat. Add brown onion. Cook, stirring, for 3 minutes or until browned. Add ginger and garlic. Cook, stirring, for 30 seconds or until fragrant. Add flour. Cook, stirring, for 4 minutes or until mixture is well browned.'),
(13, 3, 'Add curry powder and tomato paste. Stir to combine. Add 3/4 cup of the stock. Stir until well combined. Add remaining stock and 1 1/4 cups water. Bring to a simmer. Add chicken and carrot. Reduce heat to medium-low. Simmer for 15 minutes or until chicken is cooked through. Add beans, sauces and honey. Cook for a further 5 minutes or until beans are tender.'),
(13, 4, 'Sprinkle curry with spring onion and sesame seeds. Serve with pickled ginger and rice.'),
(14, 1, 'Place spring onion in a bowl. Cover with iced water. Stand for 5 mins. Drain.'),
(14, 2, 'Meanwhile, cook the edamame or broad beans in a saucepan of boiling water following packet directions. Refresh under cold water. Drain well. Peel and transfer to a bowl.'),
(14, 3, 'To make the Japanese dressing, combine the spring onion, soy sauce, vinegar, lime juice, oil, ginger and sesame seeds in a small bowl.'),
(14, 4, 'Divide soba noodles among serving bowls. Top with carrot, radish, edamame or broad beans, cucumber and salmon. Drizzle with the dressing.');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `rid` int(11) NOT NULL,
  `ingredientid` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`rid`, `ingredientid`, `value`) VALUES
(1, 1, '250g dried rice noodles'),
(1, 2, '1.5 tablespoons rice bran oil'),
(1, 3, '350g chicken thigh fillets'),
(1, 4, '1 carrot'),
(1, 5, '4 shallots'),
(1, 6, '150g snow peas'),
(1, 7, '240g Pad Thai paste'),
(1, 8, '2 eggs'),
(1, 9, '65g bean sprouts'),
(1, 10, '55g roasted unsalted peanuts'),
(9, 1, '1 tablespoon peanut oil'),
(9, 2, '400g chicken thigh fillets'),
(9, 3, '1 brown onion'),
(9, 4, '1cm-piece ginger'),
(9, 5, '2 tablespoons mild curry paste'),
(9, 6, '1/2 cauliflower'),
(9, 7, '200g basmati rice'),
(9, 8, '75g unsalted roasted cashews'),
(9, 9, '120 frozen peas'),
(9, 10, '375ml salt-reduced chicken stock'),
(9, 11, 'Coriander leaves'),
(10, 1, '2 cups of chopped kimchi'),
(10, 2, '1/2 pound of pork shoulder, cut into bite sized pieces'),
(10, 3, '2 tablespoons of hot pepper paste'),
(10, 4, '1 teaspoon of sugar'),
(10, 5, '5 cups of water'),
(10, 6, '2 stalks of green onions, chopped'),
(10, 7, '1 package of tofu (400g), cut into bite sized cubes'),
(11, 1, '200g salmon fillet'),
(11, 2, '200g blue-eye fillet'),
(11, 3, '1kg medium green prawns, peeled and devained'),
(11, 4, '4 cleaned calamari hoods'),
(11, 5, 'Steamed jasmine rice'),
(11, 6, 'Barbecued lime halved'),
(11, 7, '2 tablespoons kecap manis'),
(11, 8, '2 tablespoons brown sugar'),
(11, 9, '3cm piece fresh ginger, cut'),
(11, 10, '1 stick lemongrass, finely chopped'),
(11, 11, '2 tablespoons lime juice'),
(11, 12, '2 tablespoons sweet chilli sauce'),
(11, 13, '4 kaffir lime leaves, vein removed'),
(11, 14, '2 teaspoons fish sauce'),
(12, 1, '200g butter, chopped'),
(12, 2, '200g dark chocolate, chopped'),
(12, 3, '4 eggs'),
(12, 4, '1 cup caster sugar'),
(12, 5, '2 teaspoons vanilla bean paste'),
(12, 6, '1/4 cup Dutch-processed cocoa powder'),
(12, 7, '1/4 cup plain flour'),
(12, 8, '1/2 cup malted milk powder'),
(12, 9, '1/3 cup almond meal'),
(12, 10, '1 cup brown sugar'),
(12, 11, '50g butter, chopped'),
(12, 12, '300ml thickened cream'),
(12, 13, '1 teaspoon sea salt'),
(13, 1, '1 tablespoon vegetable oil'),
(13, 2, '600g chicken thigh fillets'),
(13, 3, '60g butter, chopped'),
(13, 4, '1 small brown onion'),
(13, 5, '2cm piece fresh ginger'),
(13, 6, '2 garlic cloves'),
(13, 7, '1/4 cup plain flour'),
(13, 8, '2 tablespoons curry powder'),
(13, 9, '2 tablespoons tomato paste'),
(13, 10, '2 cups chicken stock'),
(13, 11, '2 carrots, sliced diagonally'),
(13, 12, '150g green beans'),
(13, 13, '1/4 cup apple sauce'),
(13, 14, '1 tablespoon soy sauce'),
(13, 15, '1 tablespoon honey'),
(13, 16, '2 spring onions'),
(13, 17, '1 teaspoon sesame seeds'),
(13, 18, 'Pickled ginger'),
(13, 19, 'steamed Japanese rice'),
(14, 1, '2 spring onions, thinly sliced'),
(14, 2, '200g frozen edamame'),
(14, 3, '270g soba noodles'),
(14, 4, '1 carrot, cut into matchsticks'),
(14, 5, '4 radishes, thinly sliced'),
(14, 6, '1 cucumber, thinly sliced'),
(14, 7, '360g sushi salmon belly, sliced into cubes'),
(14, 8, '1 tablespoon salt-reduced soy sauce'),
(14, 9, '1 tablespoon rice wine vinegar'),
(14, 10, '1 teaspoon sesame oil'),
(14, 11, '1 teaspoon finely grated ginger'),
(14, 12, '1/4 teaspoon toasted sesame seeds');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `rid` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prepTime` varchar(255) NOT NULL,
  `servingSize` int(11) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rid`, `ownerid`, `title`, `description`, `prepTime`, `servingSize`, `imagePath`, `link`) VALUES
(1, 1, 'Chicken Pad Thai', 'If you need a fast meal, turn to this trusty dinner\r\nThai noodle dish with chicken and veggies.', '20', 4, '/upload/r12_u1_preview.jpg', ''),
(9, 9, 'Curried Chicken Pilaf', 'User your favourite curry paste to make this\r\ndelicious chicken and rice dish. Serve with Greek-style yogurt to reduce the heat.', '50', 4, '/upload/r9_u9_preview.jpeg', ''),
(10, 9, 'Kimchi soup with pork', 'I&#39;d like to introduce you to my family&#39;s special kimchi soup recipe today. It&#39;s called kimchiguk in Korean, is very easy to make and it&#39;s a well-balanced one pot meal when served with rice.', '30', 3, '/upload/r10_u9_preview.jpg', 'Eb82-kqS4fA'),
(11, 10, 'Thai style barbecued seafood', 'Dust off your barbecue for this fabulous Thai-style barbecued seafood favourite!', '270', 4, '/upload/r11_u10_preview.jpeg', ''),
(12, 10, 'Choc-malt cake with salted caramel sauce', 'A sinful dessert that leaves you wanting more! Is there a better baked dessert?', '85', 16, '/upload/r12_u10_preview.jpeg', ''),
(13, 10, 'Quick Japanese chicken curry', 'An all-time classic Japanese chicken curry that&#39;s full of flavour, quick and easy to make. This one will become a firm weeknight favourite.', '45', 4, '/upload/r13_u10_preview.jpg', 'Y0p06tRmO78'),
(14, 10, 'Sushi salmon noodle bowl', 'Easy to make! Provides a good source of protein and fibre. Try this delicious, fresh and savory salmon and noodle bowl.', '25', 4, '/upload/r14_u10_preview.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_username`, `user_email`, `user_password`) VALUES
(1, 'Zen Hao', 'gohzenhao', 'abc@gmail.com', '$2y$10$MdeH72JnZRpjKQcE.nIuHu8hGSvEQSg7ZkFUGfFviLJvzW8gD3gT.'),
(2, 'Julian', 'julian123', 'def@gmail.com', '$2y$10$is.5uVkMJjjJfdu9mUyc6OH2ozgyeNF2aWipU2N06TrB7ldbgcOyy'),
(3, 'Bobby Brown', 'test123', 'bb@gmail.com', '$2y$10$N3/4q/dX2gTiQ4w4tir.jO2HbFCChg47SZlhogXsjgkPjp/EgxvXu'),
(5, 'Jason Statham', 'jason123', 'js123@hotmail.com', '$2y$10$vpgia99w0NuVHPb2ZEa0E.9g1D2.gqS.ADwOfNon.5oUPRY8UIY56'),
(7, 'tony', 'tonyliao', 'sad@gmail.com', '$2y$10$NUMPbRFEsOLY3xYPHLVa7.jkjPg/i2iXfuhNEexHrLDL6Q1slTy1e'),
(8, 'Water Bottle', 'water123', 'wb@wb.com', '$2y$10$17p125KW0shapumQaRf9BOVkS.nTVbF4Y4Qz2IMA.ZTLZShrgegIy'),
(9, 'Tom Holland', 'tomholland', 'tom@gmail.com', '$2y$10$6n4uv6mf7PKhngity9T5feM4tR6nfPFEaZGkyI9Ai.bFd4skrmUgu'),
(10, 'Benedict Cumberbatch', 'benedict123', 'ben@gmail.com', '$2y$10$Q66EhEHcl7C381AfyDsQNOYJ2EDwutCG45.9RRpHml9VT1SpG3le6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `ownerid` (`ownerid`),
  ADD KEY `comments_ibfk_2` (`recipe_id`);

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`rid`,`stepNum`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `rid` (`rid`),
  ADD KEY `favourites_ibfk_2` (`user_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`rid`,`ingredientid`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `ownerid` (`ownerid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`rid`) ON DELETE CASCADE;

--
-- Constraints for table `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `recipes` (`rid`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `recipes` (`rid`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `recipes` (`rid`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
