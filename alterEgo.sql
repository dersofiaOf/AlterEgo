-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2024 г., 14:26
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `alterEgo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `ida` int NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`ida`, `phone`, `description`, `status`) VALUES
(6, '+7 (904) 169-1779', 'Изменённый текст', 'принята'),
(8, '+7 (904) 169-4568', 'ЭТО ИЗМЕНЁННЫЙ ТЕКСТ', 'принята');

-- --------------------------------------------------------

--
-- Структура таблицы `section_about_us`
--

CREATE TABLE `section_about_us` (
  `idau` int NOT NULL,
  `about_us` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_about_us`
--

INSERT INTO `section_about_us` (`idau`, `about_us`) VALUES
(1, 'Альтер Эго - это уютная музыкальная студия в Екатеринбурге, которая поможет не только освоить музыкальные инструменты или вокал, но и обрести собственную группу, с которой вы покорите сцену. Наши наставники - это действующие профессиональные музыканты. Они помогут раскрыть ваш потенциал и показать, насколько музыка может быть легкой и увлекательной.');

-- --------------------------------------------------------

--
-- Структура таблицы `section_contacts`
--

CREATE TABLE `section_contacts` (
  `idc` int NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `center_lat` float NOT NULL,
  `center_lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_contacts`
--

INSERT INTO `section_contacts` (`idc`, `phone`, `city`, `address`, `center_lat`, `center_lng`) VALUES
(1, '+7 912 666-57-60', 'г. Екатеринбург', 'ул. Бородина, д. 30', 56.756, 60.6978);

-- --------------------------------------------------------

--
-- Структура таблицы `section_directions`
--

CREATE TABLE `section_directions` (
  `idd` int NOT NULL,
  `directionsImg` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `iconP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_directions`
--

INSERT INTO `section_directions` (`idd`, `directionsImg`, `iconP`) VALUES
(1, 'guitar_electric_icon.svg', 'Электрогитара'),
(2, 'bass-guitar_icon.svg', 'Басс-гитара'),
(3, 'music_drums_icon.svg', 'Барабаны'),
(4, 'piano_icon.svg', 'Клавишные'),
(5, 'rehearsals_icon.svg', 'Репетиции'),
(6, 'microphone_icon.svg', 'Вокал');

-- --------------------------------------------------------

--
-- Структура таблицы `section_faq`
--

CREATE TABLE `section_faq` (
  `idfaq` int NOT NULL,
  `question_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `question_text` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_faq`
--

INSERT INTO `section_faq` (`idfaq`, `question_title`, `question_text`) VALUES
(1, 'Как проходят занятия?', 'Обучение выстраивается в зависимости от твоих целей и задач. Мечтаешь научиться играть вступление из Smells Like Teen Spirit или хочешь погрузиться в теорию и изучить ноты? Без проблем! Не бойся говорить наставнику о своих предпочтениях и вы вместе сможете выбрать комфортную для тебя траекторию занятий! Главное - не бойся задавать вопросы, наши наставники всегда помогут и поддержат!'),
(3, 'Я очень много работаю/учусь, получится ли у меня совмещать свою деятельность с музыкой?', 'Мы работаем каждый день с 12:00 до 22:00 без выходных и перерывов, так что мы вместе сможем подобрать для тебя удобное время!'),
(4, 'А если я совсем не умею играть/петь?', 'Все мы когда-то с чего-то начинали) На самом деле, неважно какой у тебя уровень игры, главное какие у тебя цели. Многие музыканты в нашей студии приходили к нам не зная ничего об инструментах, зато теперь они блистают на наших отчетных концертах и живут музыкой. Главное начать, а с развитием мы поможем!'),
(5, 'Мне кажется я уже слишком взрослый для занятий музыкой, нужно было начинать раньше', 'Начать никогда не поздно! Да банально, но это правда. У нас много взрослых музыкантов, которые начали играть год-два назад, а теперь отыгрывают каждую репетицию  с горящими глазами и готовят что-то новое к каждому концерту.  Долой страхи, давайте вместе зажигать!');

-- --------------------------------------------------------

--
-- Структура таблицы `section_slider`
--

CREATE TABLE `section_slider` (
  `ids` int NOT NULL,
  `slider_photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_slider`
--

INSERT INTO `section_slider` (`ids`, `slider_photo`) VALUES
(10, '../../img/concerts/image.jpg'),
(12, '../../img/concerts/4InzEaI3EzQ.jpg'),
(13, '../../img/concerts/music-people-crowd-concert-band-audience-festival-lights-stage-performance-musicians-rock-concert-musical-theatre-La-Smala-Les-Ardentes-2016-1173870.jpg'),
(14, '../../img/concerts/pexels-thibault-trillet-167636-scaled.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `section_teachers`
--

CREATE TABLE `section_teachers` (
  `idt` int NOT NULL,
  `teachersImg` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nameP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descriptionP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_teachers`
--

INSERT INTO `section_teachers` (`idt`, `teachersImg`, `nameP`, `descriptionP`) VALUES
(1, '1.jpeg', 'Гинзбург Анжелика', 'Самая прекрасная. Вокальный опыт и опыт выступлений 21 год. Была вокалисткой cover-группы Double Scotch. Сейчас занимается сольным проектом.'),
(2, '5.jpeg', 'Василий Пищухин', 'Строгий, но справедливый. Фронтмен и основатель группы Pine Ridge. Резидент итальянского лейбла '),
(3, '4.jpeg', 'Михаил Кисловский', 'Абсолютный музыкальный слух и абсолютная харизма.\r\nВзял гитару в 13 лет. Играл в разных группах Екатеринбурга, на данный момент участник группы Pine Ridge.');

-- --------------------------------------------------------

--
-- Структура таблицы `section_welcome`
--

CREATE TABLE `section_welcome` (
  `idw` int NOT NULL,
  `welcome-title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `welcome-p` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `background-image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `section_welcome`
--

INSERT INTO `section_welcome` (`idw`, `welcome-title`, `welcome-p`, `background-image`) VALUES
(1, 'Альтер Эго', 'Получи возможность выступать на большой сцене и собрать свою группу!', 'img/6649ede39970a-bg-img-index.avif');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `ids` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`ids`, `status`) VALUES
(1, 'в обработке'),
(3, 'отменена'),
(2, 'принята');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idu` int NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idu`, `fio`, `phone`, `email`, `login`, `password`) VALUES
(31, 'Деревягина Софья Олеговна', '+7 (904) 169-1779', 'test@test.com', 'test1', 'testtest1'),
(32, 'Игорь Натальевич Катамаранов', '+7 (904) 169-4568', 'igor1986@gmail.com', 'test2', 'testtest2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ida`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `section_about_us`
--
ALTER TABLE `section_about_us`
  ADD PRIMARY KEY (`idau`);

--
-- Индексы таблицы `section_contacts`
--
ALTER TABLE `section_contacts`
  ADD PRIMARY KEY (`idc`);

--
-- Индексы таблицы `section_directions`
--
ALTER TABLE `section_directions`
  ADD PRIMARY KEY (`idd`);

--
-- Индексы таблицы `section_faq`
--
ALTER TABLE `section_faq`
  ADD PRIMARY KEY (`idfaq`);

--
-- Индексы таблицы `section_slider`
--
ALTER TABLE `section_slider`
  ADD PRIMARY KEY (`ids`);

--
-- Индексы таблицы `section_teachers`
--
ALTER TABLE `section_teachers`
  ADD PRIMARY KEY (`idt`);

--
-- Индексы таблицы `section_welcome`
--
ALTER TABLE `section_welcome`
  ADD PRIMARY KEY (`idw`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`ids`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `ida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `section_about_us`
--
ALTER TABLE `section_about_us`
  MODIFY `idau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `section_contacts`
--
ALTER TABLE `section_contacts`
  MODIFY `idc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `section_directions`
--
ALTER TABLE `section_directions`
  MODIFY `idd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `section_faq`
--
ALTER TABLE `section_faq`
  MODIFY `idfaq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `section_slider`
--
ALTER TABLE `section_slider`
  MODIFY `ids` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `section_teachers`
--
ALTER TABLE `section_teachers`
  MODIFY `idt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `section_welcome`
--
ALTER TABLE `section_welcome`
  MODIFY `idw` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `ids` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `app_ibfk_1` FOREIGN KEY (`status`) REFERENCES `statuses` (`status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
