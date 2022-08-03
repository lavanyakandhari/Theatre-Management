--
-- Citation:https://www.students.cs.ubc.ca/~cs-304/resources.html
-- CS304 resources
--
-- Database Table Creation
-- project_h8w1b_n7v2b_r5i2b

-- Drop existing tables.
drop table fooditempurchase cascade constraints;
drop table fooditem cascade constraints;
drop table normalticket cascade constraints;
drop table goldticket cascade constraints;
drop table customer_nonmember cascade constraints;
drop table customer_member cascade constraints;
drop table rec_seat cascade constraints;
drop table nonrec_seat cascade constraints;
drop table movieshowing cascade constraints;
drop table auditorium cascade constraints;
drop table theatre cascade constraints;
drop table theatrechain cascade constraints;

-- Add tables

create table theatrechain(
    chain_id integer not null,
    chain_name char(40),
    primary key (chain_id)
);

grant select on theatrechain to public;

create table theatre(
    loc_id integer not null,
    postal_code char(6) null,
    city char(20) null,
    province char(20) null,
    chain_id integer not null,
    primary key (loc_id),
    foreign key (chain_id) references theatrechain ON DELETE CASCADE
);

grant select on theatre to public;

create table auditorium(
    room_num integer not null,
    loc_id integer not null,
    num_rec_seats integer not null,
    num_nonrec_seats integer not null,
    primary key (room_num, loc_id),
    foreign key (loc_id) references theatre ON DELETE CASCADE
);

grant select on auditorium to public;

create table movieshowing(
    movie_title char(40) not null,
    sdatetime char(40) not null,
    runtime char(10) null,
    room_num integer not null,
    loc_id integer not null,
    primary key (sdatetime, room_num, loc_id),
    foreign key (room_num, loc_id) references auditorium ON DELETE CASCADE
);

grant select on movieshowing to public;

-- modification of ER diagram
create table nonrec_seat(
    nonrec_seatnum integer not null,
    room_num integer not null,
    loc_id integer not null,
    sdatetime char(40) not null,
    -- check (nonrec_seatnum >= 0 and nonrec_seatnum <= (SELECT rec_seats FROM auditorium a WHERE loc_id = a.loc_id and room_num = a.room_num)),
    primary key (nonrec_seatnum, room_num, loc_id, sdatetime),
    foreign key (sdatetime, room_num, loc_id) references movieshowing ON DELETE CASCADE 
);

grant select on nonrec_seat to public;

create table rec_seat(
    rec_seatnum integer not null,
    room_num integer not null,
    loc_id integer not null,
    sdatetime char(40) not null,
    -- check (rec_seatnum >= 0 and rec_seatnum <= (SELECT num_rec_seats FROM auditorium a WHERE loc_id = a.loc_id and room_num = a.room_num)),
    primary key (rec_seatnum, room_num, loc_id, sdatetime),
    foreign key (sdatetime, room_num, loc_id) references movieshowing ON DELETE CASCADE 
);

grant select on rec_seat to public;

create table customer_nonmember(
    email char(40) not null,
    cname char(40) null,
    phone_num char(20) null,
    payment_method char(40) not null,
    chain_id integer not null,
    primary key (email),
    foreign key (chain_id) references theatrechain ON DELETE CASCADE
);

grant select on customer_nonmember to public;

create table customer_member(
    email char(40) not null,
    cname char(40) not null,
    phone_num char(20) unique not null,
    payment_method char(40) not null,
    chain_id integer not null,
    reward_points integer not null,
    primary key (email),
    foreign key (chain_id) references theatrechain ON DELETE CASCADE
);

grant select on customer_member to public;

create table normalticket(
    ticket_id integer not null,
    nprice integer not null,
    sdatetime char(40),
    room_num integer not null,
    loc_id integer not null,
    nonrec_seatnum integer not null,
    email char(40) not null,
    unique (nonrec_seatnum, room_num, loc_id),
    primary key (ticket_id),
    foreign key (nonrec_seatnum, room_num, loc_id, sdatetime) references nonrec_seat ON DELETE CASCADE
);

grant select on normalticket to public;

create table goldticket(
    ticket_id integer not null,
    nprice integer not null,
    sdatetime char(40),
    room_num integer not null,
    loc_id integer not null,
    rec_seatnum integer not null,
    email char(40) not null,
    unique (rec_seatnum, room_num, loc_id),
    primary key (ticket_id),
    foreign key (rec_seatnum, room_num, loc_id, sdatetime) references rec_seat ON DELETE CASCADE
);

grant select on goldticket to public; 

create table fooditem(
    itemname char(20) not null,
    primary key (itemname)
);

grant select on fooditem to public; 

create table fooditempurchase(
    sale_id integer not null, 
    email char(40) not null,
    itemname char(20) not null,
    itemprice integer, -- depends on email indicating membership
    primary key (sale_id),
    foreign key (itemname) references fooditem ON DELETE CASCADE
);

grant select on fooditempurchase to public; 

-- starter inputs
insert into theatrechain values(001, 'AMC');

insert into theatre values(001, 'AAA111', 'Vancouver', 'British Columbia', 001);

insert into auditorium values(1, 001, 10, 30);

insert into movieshowing values('Spider-Man: No Way Home', '2021-12-17 12:00:00', '120 min', 1, 001);
insert into movieshowing values('The King''s Man', '2021-12-17 15:00:00', '120 min', 1, 001);

insert into nonrec_seat values(1, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(2, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(3, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(4, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(5, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(6, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(7, 1, 001, '2021-12-17 12:00:00');
insert into nonrec_seat values(8, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(1, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(2, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(3, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(4, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(5, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(6, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(7, 1, 001, '2021-12-17 12:00:00');
insert into rec_seat values(8, 1, 001, '2021-12-17 12:00:00');

insert into customer_nonmember values('customer1@mail.com', 'Customer One', '6047773421', 'MasterCard', 001);
insert into customer_member values('customer2@mail.com', 'Customer Two', '6047773422', 'MasterCard', 001, 0);

insert into normalticket values(001, 5.00, '2021-12-17 12:00:00', 1, 001, 1, 'customer1@mail.com');
insert into goldticket values(001, 5.00, '2021-12-17 12:00:00', 1, 001, 1, 'customer2@mail.com');

insert into fooditem values('Popcorn');
insert into fooditem values('Hot Dog');
insert into fooditem values('Juice');
insert into fooditem values('Coke');

insert into fooditempurchase values(001, 'customer1@mail.com', 'Popcorn', 2.00);
-- customer 2 is member therefore lower price for food item
insert into fooditempurchase values(002, 'customer2@mail.com', 'Popcorn', 1.00);



