-- add_test_data.sql
INSERT INTO WP_CAMPUS (CAMPUS_CODE, CAMPUS_NAME) VALUES 
   ('uhsys','UH System Office'),
   ('uhm','Manoa'),
   ('uhwo','West Oahu'),
   ('uhh','Hilo'),
   ('hawcc','Hawaii'),
   ('honcc','Honolulu'),
   ('kcc','Kapiolani'),
   ('kaucc','Kauai'),
   ('lcc','Leeward'),
   ('uhmc','Maui'),
   ('wcc','Windward'),
   ('rcuh','Research Corporation of UH'),
   ('uhf','UH Foundation');

INSERT INTO WP_DEPT_GRP (DEPT_GRP, DEPT_GRP_NAME, CAMPUS_CODE) VALUES
   ('010100','Board of Regents','uhsys'),
   ('030100','State Director''s Office for Career and Technical Education','uhsys'),
   ('050100','President''s Office','uhsys'),
   ('060000','Manoa Chancellor''s Office', 'uhm'),
   ('060050','Manoa Vice Chancellor for Academic Affairs','uhm'),
   ('160100','VP for Admin-Capital Improvements','uhsys'),
   ('160200','Academy for Creative Media','uhm'),
   ('100300','UH Press','uhm');
   
