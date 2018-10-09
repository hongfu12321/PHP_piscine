SELECT COUNT(`date`) AS 'movies'
FROM member_history
WHERE (DATE(`date`) > DATE('2006-10-30') AND DATE(`date`) < DATE('2007-07-27'))
OR (MONTH(`date`) = 12 AND DAY(`date`) = 24);
