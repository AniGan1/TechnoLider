-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.131
-- Время создания: Окт 25 2025 г., 09:34
-- Версия сервера: 8.0.37-29
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `technolider`
--

-- --------------------------------------------------------

--
-- Структура таблицы `AssignmentTypes`
--

CREATE TABLE `AssignmentTypes` (
  `id_AssignmentType` int NOT NULL,
  `title_types` varchar(60) NOT NULL,
  `weight` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `AssignmentTypes`
--

INSERT INTO `AssignmentTypes` (`id_AssignmentType`, `title_types`, `weight`) VALUES
(1, 'Практическая работа', '1'),
(2, 'Самостоятельная работа', '3'),
(3, 'Контрольная работа ', '4'),
(4, 'Устная работа', '1'),
(5, 'Тест', '3'),
(6, 'Индивидуальное задание', '5'),
(7, 'тест', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id_course` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `count_hours` int NOT NULL,
  `semstr` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id_course`, `title`, `description`, `count_hours`, `semstr`) VALUES
(1, 'Английский язык', 'Дисциплина по иностранному языку - английский', 36, 1),
(2, 'МДК09.01', '.', 36, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Grades`
--

CREATE TABLE `Grades` (
  `id_grade` int NOT NULL,
  `grade_title` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `type_job` int NOT NULL,
  `id_student` int NOT NULL,
  `id_course` int NOT NULL,
  `id_teacher` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Grades`
--

INSERT INTO `Grades` (`id_grade`, `grade_title`, `date`, `type_job`, `id_student`, `id_course`, `id_teacher`) VALUES
(2, '5', '2025-10-23', 1, 5, 2, 5),
(3, '4', '2025-10-23', 4, 5, 2, 5),
(4, '5', '2025-10-23', 3, 5, 1, 5),
(5, '4', '2025-10-25', 4, 6, 2, 5),
(6, '2', '2025-10-25', 2, 6, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `groupsStudents`
--

CREATE TABLE `groupsStudents` (
  `id_groupsStudents` int NOT NULL,
  `id_student` int NOT NULL,
  `id_group` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groupsStudents`
--

INSERT INTO `groupsStudents` (`id_groupsStudents`, `id_student`, `id_group`) VALUES
(1, 5, 1),
(2, 6, 1),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Lessons`
--

CREATE TABLE `Lessons` (
  `id_lesson` int NOT NULL,
  `datetime` datetime NOT NULL,
  `audience` int NOT NULL,
  `id_course` int NOT NULL,
  `id_group` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Lessons`
--

INSERT INTO `Lessons` (`id_lesson`, `datetime`, `audience`, `id_course`, `id_group`) VALUES
(1, '2025-10-24 10:20:00', 405, 2, 1),
(2, '2025-10-25 12:45:00', 234, 2, 1),
(3, '2025-10-25 10:59:00', 342, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `title`) VALUES
(1, 'Студент'),
(2, 'Преподаватель');

-- --------------------------------------------------------

--
-- Структура таблицы `StudentGroups`
--

CREATE TABLE `StudentGroups` (
  `id_StudentGroup` int NOT NULL,
  `title_group` varchar(60) NOT NULL,
  `kurator` varchar(60) NOT NULL,
  `year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `StudentGroups`
--

INSERT INTO `StudentGroups` (`id_StudentGroup`, `title_group`, `kurator`, `year`) VALUES
(1, 'В-4', 'Александр Песоцкий', 2022),
(2, 'П-4', 'Даниил Борисов', 2022);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_student` int NOT NULL,
  `year_post` int NOT NULL,
  `form_study` varchar(100) NOT NULL,
  `id_user` int NOT NULL,
  `number_stud_ticket` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_student`, `year_post`, `form_study`, `id_user`, `number_stud_ticket`) VALUES
(5, 2022, 'Очная', 1, 21314),
(6, 2022, 'Очная', 3, 46677890),
(7, 2025, 'Очный', 5, 2355);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int NOT NULL,
  `academic_degree` varchar(60) NOT NULL,
  `job_title` varchar(60) NOT NULL,
  `contacts_data` varchar(100) NOT NULL,
  `id_user` int NOT NULL,
  `id_course` int NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `academic_degree`, `job_title`, `contacts_data`, `id_user`, `id_course`, `department`) VALUES
(5, 'Кандидат наук', 'Преподаватель', '+79994789999', 2, 2, 'Информационные технологии');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_role` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `email`, `id_role`) VALUES
(1, 'kostya', 'kostya', 'kshafikov@gmail.com', 1),
(2, 'ivanov', 'ivanov', 'ivanov@gmail.com', 2),
(3, 'kalinin', 'kalinin', 'kalinin@gmail.com', 1),
(4, 'saveli', 'saveli', 'saveli@gmail.com', 1),
(5, 'misha', 'misha', 'misha@gmail.com', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `AssignmentTypes`
--
ALTER TABLE `AssignmentTypes`
  ADD PRIMARY KEY (`id_AssignmentType`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Индексы таблицы `Grades`
--
ALTER TABLE `Grades`
  ADD PRIMARY KEY (`id_grade`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `type_job` (`type_job`);

--
-- Индексы таблицы `groupsStudents`
--
ALTER TABLE `groupsStudents`
  ADD PRIMARY KEY (`id_groupsStudents`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_student` (`id_student`);

--
-- Индексы таблицы `Lessons`
--
ALTER TABLE `Lessons`
  ADD PRIMARY KEY (`id_lesson`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_group` (`id_group`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `StudentGroups`
--
ALTER TABLE `StudentGroups`
  ADD PRIMARY KEY (`id_StudentGroup`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_course` (`id_course`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `AssignmentTypes`
--
ALTER TABLE `AssignmentTypes`
  MODIFY `id_AssignmentType` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Grades`
--
ALTER TABLE `Grades`
  MODIFY `id_grade` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `groupsStudents`
--
ALTER TABLE `groupsStudents`
  MODIFY `id_groupsStudents` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Lessons`
--
ALTER TABLE `Lessons`
  MODIFY `id_lesson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `StudentGroups`
--
ALTER TABLE `StudentGroups`
  MODIFY `id_StudentGroup` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Grades`
--
ALTER TABLE `Grades`
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`),
  ADD CONSTRAINT `grades_ibfk_4` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_5` FOREIGN KEY (`type_job`) REFERENCES `AssignmentTypes` (`id_AssignmentType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groupsStudents`
--
ALTER TABLE `groupsStudents`
  ADD CONSTRAINT `groupsstudents_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `StudentGroups` (`id_StudentGroup`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupsstudents_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Lessons`
--
ALTER TABLE `Lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `StudentGroups` (`id_StudentGroup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_ibfk_4` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
