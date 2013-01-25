SELECT first, last
FROM MovieActor natural join Movie, Actor
WHERE Movie.title = 'Die Another Day' and 
      Movie.id = MovieActor.mid       and 
      Actor.id = MovieActor.aid ;
