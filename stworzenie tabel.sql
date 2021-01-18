create database bts_database;
use bts_database;

create table users
(
    Ids int(100) not null primary key auto_increment,
    Usernames varchar(15) not null,
    Passwords varchar(100) not null,
    Display_names varchar(20) not null,
    Avatar varchar(100) not null
);
alter table users change Avatar Avatar varchar(100) character set utf8mb4 collate utf8mb4_general_ci not null default 'default.png';

create table comments
{
    Id int(100) not null primary key auto_increment,
    Member varchar(20) not null,
    Username varchar(15) not null,
    Comment varchar(240) not null,
    Date datetime not null
}

create table bts_members 
(
    Stage_name varchar(10) not null,
    Stage_name_in_Hangul varchar(30) not null,
    Korean_name varchar(50) not null,
    Korean_name_in_Hangul varchar(50) not null,
    Birthday date not null,
    Hometown varchar(15) not null,
    Position varchar(200) not null
);

insert into bts_members values ("RM", "아르엠", "Kim Namjoon", "김남준", '1994-09-12', "Ilsan", "Leader, Main Rapper");
insert into bts_members values ("Jin", "진", "Kim Seokjin", "김석진", '1992-12-04', "Gwacheon" , "Sub Vocalist, Visual");
insert into bts_members values ("Suga", "슈가", "Min Yoongi", "민윤기", '1993-03-09', "Daegu", "Lead Rapper");
insert into bts_members values ("JHope", "제이홉", "Jung Hoseok", "정호석", '1994-02-18', "Gwangju", "Main Dancer, Sub Rapper, Sub Vocalist");
insert into bts_members values ("Jimin", "지민", "Park Jimin", "박지민", '1995-10-13', "Busan", "Main Dancer, Lead Vocalist");
insert into bts_members values ("V", "뷔", "Kim Taehyung", "김태형", '1995-12-30', "Daegu", "Lead Dancer, Sub Vocalist, Visual");
insert into bts_members values ("Jungkook", "정국", "Jeon Jeongguk", "전정국", '1997-09-01', "Busan", "Main Vocalist, Lead Dancer, Sub Rapper, Center, Maknae");
select * from bts_members;

create table bts_mvs
(
    Song_name varchar(60) not null,
    Original_name varchar(60),
    Released_date date not null,
    Length time not null,
    Released_language varchar(30) not null,
    Link_youtube varchar(300) not null,
    Producers varchar(100),
    Composers varchar(300),
    Lyricists varchar(300)
);

insert into bts_mvs values("Life Goes On: like an arrow", "삶은계속됩니다:쏜살같이", '2020-11-29', '3:36', "Korean", "https://www.youtube.com/watch?v=2N-Fsa9Evo0", "Jungkook", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Life Goes On: in the forrest", "삶은계속됩니다:숲속에", '2020-11-25', '3:36', "Korean", "https://www.youtube.com/watch?v=RvcP6V4h_q4", "Jungkook", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Life Goes On: on my pillow", "삶은계속됩니다:내베개져", '2020-11-21', '3:36', "Korean", "https://www.youtube.com/watch?v=yIvb4csSgcs", "Jungkook", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Life Goes On", "삶은계속됩니다", '2020-11-20', '3:51', "Korean", "https://www.youtube.com/watch?v=-5q5mZbe3V8", "Jungkook", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Dynamite (70s' Remix)", "다이너마이트", '2020-09-20', '3:22', "English", "https://www.youtube.com/watch?v=WRoZgfjzGNQ", "Lumpens", "-", "-");
insert into bts_mvs values("Dynamite (BSide Ver)", "다이너마이트", '2020-08-24', '3:47', "English", "https://www.youtube.com/watch?v=BV2FdDmGiW0", "Lumpens", "-", "-");
insert into bts_mvs values("Dynamite", "다이너마이트", '2020-08-21', '3:44', "English", "https://www.youtube.com/watch?v=gdZLi9oWNZg", "Lumpens", "-", "-");
insert into bts_mvs values("Stay Gold", "金のままでいる", '2020-06-26', '4:15', "Japanese", "https://www.youtube.com/watch?v=9IHwqdz8Xhw", "Ko YooJeong", "-", "-");
insert into bts_mvs values("We Are Bulletproof: The Eternal", "위아불렛프루프:영원한사람", '2020-06-11', '4:32', "Korean", "https://www.youtube.com/watch?v=7UWBYJjuIL0", "Yoon Ako", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Black Swan", "흑조", '2020-03-05', '3:38', "Korean", "https://www.youtube.com/watch?v=0lapF4DQPKQ", "Lumpens", "RM", "RM");
insert into bts_mvs values("ON", "온", '2020-02-28', '5:55', "Korean", "https://www.youtube.com/watch?v=mPVDGOVjRQ0", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("ON (Kinetic Manifesto Film: Come Prima)", "온", '2020-02-21', '4:58', "Korean", "https://www.youtube.com/watch?v=gwMa6gpoE9I", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Black Swan (Art Film performed by MN Dance Company)", "흑조", '2020-01-17', '5:31', "Korean", "https://www.youtube.com/watch?v=vGbuUFRdYqU", "Lumpens", "RM", "RM");
insert into bts_mvs values("Make It Right (feat Lauv)", "메이킷 롸잇", '2019-10-18', '4:18', "Korean", "https://www.youtube.com/watch?v=eXBu09fwe3I", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Lights", "ライト", '2019-07-02', '5:27', "Japanese", "https://www.youtube.com/watch?v=eaUpme4jalE", "GDW", "-", "-");
insert into bts_mvs values("Heartbeat", '심장박동', '2019-06-28', '4:16', "Korean", "https://www.youtube.com/watch?v=aKSxbt-O6TA", "Ahn Jiyoung", "RM", "RM");
insert into bts_mvs values("Boy With Luv (feat Halsey) (ARMY With Luv Ver)", "작은것들을위한시",'2019-04-26', '4:03', "Korean", "https://www.youtube.com/watch?v=62E_xyj_oDA", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Boy With Luv (feat Halsey)", "작은것들을위한시",'2019-04-12', '4:13', "Korean", "https://www.youtube.com/watch?v=XsX3ATc3FbA", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Airplane pt2", "飛行機 pt2", '2018-11-08', '3:47', "Japanese", "https://www.youtube.com/watch?v=CxnJf0tWu48", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Idol (feat Nicki Minaj)", "아이돌", '2018-09-06', '4:54', "Korean", "https://www.youtube.com/watch?v=K1scjjbfNsk", "Lumpens", "RM", "RM");
insert into bts_mvs values("Idol", "아이돌", '2018-08-24', '3:51', "Korean", "https://www.youtube.com/watch?v=pBuZEGYXA6E", "Lumpens", "RM", "RM");
insert into bts_mvs values("Fake Love (Extended Ver)", "페이크러브", '2018-06-01', '6:22', "Korean", "https://www.youtube.com/watch?v=D_6QmL6rExk", "Lumpens", "RM", "RM");
insert into bts_mvs values("Fake Love", "페이크러브", '2018-06-18', '5:19', "Korean", "https://www.youtube.com/watch?v=7C2z4GqqS5E", "Lumpens", "RM", "RM");
insert into bts_mvs values("Mic Drop (Japanese Ver)", "マイクドロップ", '2017-12-05', '4:29', "Japanese", "https://www.youtube.com/watch?v=8mBHDHIb-kM", "GDW", "RM, JHope", "RM, JHope");
insert into bts_mvs values("Mic Drop (Steve Aoki Remix)", "마이크드롭", '2017-11-24', '4:34', "Korean", "https://www.youtube.com/watch?v=kTlv5_Bs8aw", "GDW", "RM, JHope", "RM, JHope");
insert into bts_mvs values("DNA", "디엔에이", '2017-09-18', '4:15', "Korean", "https://www.youtube.com/watch?v=MBdVXkSdhwU", "Lumpens", "RM, Suga", "RM, Suga");
insert into bts_mvs values("Blood, Sweat & Tears (Japanese Ver)", "血、汗、涙", '2017-05-09', '4:12', "Japanese", "https://www.youtube.com/watch?v=7OX7dIRReSA", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Not Today", "낫투데이", '2017-02-20', '4:51', "Korean", "https://www.youtube.com/watch?v=9DwzBICPhdM", "GDW", "RM", "RM");
insert into bts_mvs values("Spring Day", "봄날", '2017-02-13', '5:28', "Korean", "https://www.youtube.com/watch?v=xEeFrLSkMm8", "Lumpens", "RM, Suga", "RM, Suga");
insert into bts_mvs values("Blood, Sweat & Tears", "피땀눈물", "2016-10-09", '6:03', "Korean", "https://www.youtube.com/watch?v=hmE9f-TEutc", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Save ME", "세이브미", '2016-05-15', '3:36', "Korean", "https://www.youtube.com/watch?v=GZjt_sA2eso", "GDW", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("FIRE", "불타오르네", '2016-05-01', '4:54', "Korean", "https://www.youtube.com/watch?v=ALj5MKjy2BU", "Lumpens", "RM, Suga", "RM, Suga");
insert into bts_mvs values("EPILOGUE: Young Forever", "에필로그:영포에버", '2016-04-19', '3:25', "Korean", "https://www.youtube.com/watch?v=HBj4y9Zibao", "GDW", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Run (Japanese Ver)", "走る", '2016-03-11', '3:55', "Japanese", "https://www.youtube.com/watch?v=a16gTN7kOWU", "Lumpens", "RM, Suga, JHope, V, Jungkook", "RM, Suga, JHope, V, Jungkook");
insert into bts_mvs values("Run", "런", '2015-11-29', '7:31', "Korean", "https://www.youtube.com/watch?v=5Wn85Ge22FQ", "Lumpens", "RM, Suga, JHope, V, Jungkook", "RM, Suga, JHope, V, Jungkook");
insert into bts_mvs values("I NEED U (Japanese Ver)", " 私はあなたが必要", '2015-12-01', '3:39', "Japanese", "https://www.youtube.com/watch?v=LYAcYSmaLoc", "Lumprns", "RM", "RM");
insert into bts_mvs values("FOR YOU", "あなたのために", '2015-06-05', '5:06', "Japanese", "https://www.youtube.com/watch?v=TTG6nxwdhyA", "Zanybros", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("DOPE", "쩔어", '2015-05-23', '4:16', "Korean", "https://www.youtube.com/watch?v=BVwAVbKYYeM", "GDW", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("I NEED U", "아이니드유", '2015-04-29', '3:40', "Korean", "https://www.youtube.com/watch?v=NMdTd9e-LEI", "Lumpens", "RM", "RM");
insert into bts_mvs values("War Of Hormone", "호르몬전쟁", '2014-10-21', '4:58', "Korean", "https://www.youtube.com/watch?v=XQmpVHUi-0A", "Zanybros", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Danger", "댄저", '2014-08-19', '4:59', "Korean", "https://www.youtube.com/watch?v=bagj78IQ3l0", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Just One Day", "하루만", '2014-04-06', '4:08', "Korean", "https://www.youtube.com/watch?v=DTcKkcyS410", "Lumpens", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("Boy In Luv (Dance Ver)", "상남자", '2014-02-20', '3:59', "Korean", "https://www.youtube.com/watch?v=V7RL1V15OTY", "Lumpens", "RM, Suga", "RM, Suga");
insert into bts_mvs values("Boy In Luv", "상남자", '2014-02-11', '4:42', "Korean", "https://www.youtube.com/watch?v=m8MfJg68oCs", "Lumpens", "RM, Suga", "RM, Suga");
insert into bts_mvs values("We Are Bulletproof pt2", "위아불렛프루프 Pt.2", '2013-07-16', '3:52', "Korean", "https://www.youtube.com/watch?v=gqhWHy0rrtM", "Zanybros", "RM, Suga", "RM, Suga");
insert into bts_mvs values("N.O", "엔.오", '2013-07-10', '4:02', "Korean", "https://www.youtube.com/watch?v=mmgxPLLLyVo", "Zanybros", "RM, Suga", "RM, Suga");
insert into bts_mvs values("No More Dream (Dance Ver)", "노모어드림", '2013-06-17', '4:00', "Korean", "https://www.youtube.com/watch?v=pUkViXyQTI4", "Zanybros", "RM, Suga, JHope", "RM, Suga, JHope");
insert into bts_mvs values("No More Dream", "노모어드림", '2013-06-12', '4:49', "Korean", "https://www.youtube.com/watch?v=rBG5L7UsUxA", "Zanybros", "RM, Suga, JHope", "RM, Suga, JHope");
select * from bts_mvs;
