-- Trigger when input siswa
-- DELIMITER $$
-- CREATE TRIGGER createNilai
-- 	AFTER INSERT 
--     ON siswa
--     FOR EACH ROW
-- BEGIN
-- 	DECLARE eachMapel VARCHAR(20) DEFAULT '';
--     DECLARE endloop INT DEFAULT FALSE;
--     DECLARE cursorMapel CURSOR FOR
--     	SELECT m.kodeMapel FROM matapelajaran m 
-- 			JOIN kelas k ON m.jurusan = k.jurusan
--     		JOIN siswa s ON s.kodeKelas = k.kodeKelas;
-- 	DECLARE CONTINUE HANDLER FOR NOT FOUND SET endloop = TRUE;
    
--     OPEN cursorMapel;
    
--     insertloop:LOOP
--     	FETCH cursorMapel INTO eachMapel;
--     	IF endloop THEN
--     		LEAVE insertloop;
--    		END IF;
    	
-- 		INSERT INTO nilai(NIS, kodeMapel, nilaiTugas, nilaiQuiz, nilaiUTS, nilaiUAS) VALUES
--     	(NEW.NIS, eachMapel, 0, 0, 0, 0);
-- 	END LOOP;
-- END
-- $$ DELIMITER :

-- Create view sumnilai
-- CREATE VIEW sumNilai AS
-- SELECT n.NIS, n.kodeMapel, (n.nilaiTugas + n.nilaiQuiz + n.nilaiUTS + n.nilaiUAS)/4 AS AVG 
-- FROM nilai n JOIN siswa s ON n.NIS = s.NIS;

-- Create view avgnilai
-- CREATE VIEW avgnilai AS
-- SELECT sn.NIS, s.absen, CAST(AVG(sn.AVG) AS DECIMAL(19,2)) AS AVGNilai 
-- FROM sumnilai sn JOIN siswa s ON sn.NIS = s.NIS 
-- GROUP BY sn.NIS HAVING s.absen NOT LIKE 'NULL';

-- Create trigger
-- DELIMITER $$
-- CREATE TRIGGER deletesiswa
-- AFTER DELETE
--     ON siswa
--     FOR EACH ROW
-- BEGIN
-- 	DELETE FROM nilai WHERE NIS = OLD.NIS;
-- END
-- $$ DELIMITER :
