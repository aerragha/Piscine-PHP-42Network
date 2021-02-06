SELECT film.id_genre AS 'id_genre', genre.name AS 'name_genre', film.id_distrib AS 'id_distrib', distrib.name AS 'name_distrib', film.title AS 'title_film'
FROM film INNER JOIN genre ON genre.id_genre = film.id_genre
INNER JOIN distrib ON distrib.id_distrib = film.id_distrib
WHERE film.id_genre >= 4 AND film.id_genre <= 8;
