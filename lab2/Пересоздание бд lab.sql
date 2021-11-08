create schema lab;
use lab;
create table books
(
    id       int auto_increment
        primary key,
    name     varchar(255) not null,
    pub_year varchar(255) not null
);

INSERT INTO lab.books (id, name, pub_year) VALUES (1, '1984', '1949');
INSERT INTO lab.books (id, name, pub_year) VALUES (2, 'Метро 2033', '2007');
INSERT INTO lab.books (id, name, pub_year) VALUES (3, 'Метро 2034', '2009');
INSERT INTO lab.books (id, name, pub_year) VALUES (4, 'Метро 2035', '2015');
INSERT INTO lab.books (id, name, pub_year) VALUES (5, 'Ostatnie życzenie', '1993');

create table readers
(
    id         int auto_increment
        primary key,
    last_name  varchar(255) not null,
    first_name varchar(255) not null
);

INSERT INTO lab.readers (id, last_name, first_name) VALUES (1, 'Тарасьев', 'Андрей');
INSERT INTO lab.readers (id, last_name, first_name) VALUES (2, 'Таланцев', 'Егор');
INSERT INTO lab.readers (id, last_name, first_name) VALUES (3, 'Гайдабура', 'Олег');
INSERT INTO lab.readers (id, last_name, first_name) VALUES (4, 'Смолин', 'Тимофей');
INSERT INTO lab.readers (id, last_name, first_name) VALUES (5, 'Не', 'скажу');
create table log_taking
(
    id          int auto_increment
        primary key,
    reader_id   int      not null,
    book_id     int      not null,
    taken_at    datetime not null,
    returned_at datetime null,
    constraint log_taking_ibfk_1
        foreign key (reader_id) references readers (id),
    constraint log_taking_ibfk_2
        foreign key (book_id) references books (id)
);

create index book_id
    on log_taking (book_id);

create index reader_id
    on log_taking (reader_id);

INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (1, 1, 1, '2021-10-17 01:11:38', '2021-10-17 22:38:19');
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (2, 2, 2, '2021-10-17 01:11:46', '2021-10-17 22:38:21');
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (3, 3, 4, '2021-10-17 01:11:52', '2021-10-17 22:38:23');
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (4, 4, 3, '2021-10-17 01:11:54', '2021-10-17 22:38:24');
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (5, 5, 3, '2021-10-17 01:11:56', '2021-10-17 22:38:25');
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (6, 3, 1, '2021-10-17 22:39:53', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (7, 3, 2, '2021-10-17 22:39:54', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (8, 4, 4, '2021-10-17 22:39:55', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (9, 4, 1, '2021-10-17 22:39:56', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (10, 4, 5, '2021-10-17 22:39:57', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (11, 5, 1, '2021-10-17 22:39:58', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (12, 1, 2, '2021-10-17 22:39:59', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (13, 1, 3, '2021-10-17 22:40:00', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (14, 1, 4, '2021-10-17 22:40:01', null);
INSERT INTO lab.log_taking (id, reader_id, book_id, taken_at, returned_at) VALUES (15, 1, 5, '2021-10-17 22:40:02', null);

--задание №10 на вывод
SELECT name, last_name, first_name, returned_at
FROM log_taking
INNER JOIN books ON log_taking.book_id = books.id
inner join readers on log_taking.reader_id = readers.id
where not returned_at is null;
