truncate table dispositivosconfig;
truncate table dispositivos;
alter table dispositivosconfig auto_increment 1;
alter table dispositivos auto_increment 1;

select * from dispositivosconfig;

select * from dispositivos;

CREATE TABLE dispositivosfile
(
   id        INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   iddevide  INT NOT NULL,
   fecha     varchar(20) not null,
   col001    varchar(18) default '',
   col002    varchar(18) default '',
   col003    varchar(18) default '',
   col004    varchar(18) default '',
   col005    varchar(18) default '',
   col006    varchar(18) default '',
   col007    varchar(18) default '',
   col008    varchar(18) default '',
   col009    varchar(18) default '',
   col010    varchar(18) default '',
   col011    varchar(18) default '',
   col012    varchar(18) default '',
   col013    varchar(18) default '',
   col014    varchar(18) default '',
   col015    varchar(18) default '',
   col016    varchar(18) default '',
   col017    varchar(18) default '',
   col018    varchar(18) default '',
   col019    varchar(18) default '',   
   col020    varchar(18) default '',
   col021    varchar(18) default '',
   col022    varchar(18) default '',
   col023    varchar(18) default '',
   col024    varchar(18) default '',   
   col025    varchar(18) default '',
   col026    varchar(18) default '',
   col027    varchar(18) default '',
   col028    varchar(18) default '',
   col029    varchar(18) default '',
   col030    varchar(18) default '',   
   col031    varchar(18) default '',   
   col032    varchar(18) default '',   
   col033    varchar(18) default '',   
   col034    varchar(18) default '',   
   col035    varchar(18) default '',   
   col036    varchar(18) default '',   
   col037    varchar(18) default '',   
   col038    varchar(18) default '',   
   col039    varchar(18) default '',   
   col040    varchar(18) default '',
   col041    varchar(18) default '',
   col042    varchar(18) default '',
   col043    varchar(18) default '',
   col044    varchar(18) default '',
   col045    varchar(18) default '',
   col046    varchar(18) default '',
   col047    varchar(18) default '',
   col048    varchar(18) default '',
   col049    varchar(18) default '',
   col050    varchar(18) default ''   
);