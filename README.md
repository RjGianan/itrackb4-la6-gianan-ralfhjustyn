# Question

# Which column did you make nullable, and why that one and not another?

In my migration, I made rating and year nullable because that information might not always be available when a movie is entered. I kept title and genre required because they identify and describe the movie. is_nowshowing has a default value, so it doesn’t need to be nullable.

# Which step failed first for you, and what did the error say?

The first error I encountered was when I ran php artisan db:show --counts. It said the intl PHP extension was required. Laravel needed it to format the table output. Later, when I tested the movies page, I also got “View [Movie.index] not found” because the view path used uppercase Movie, but the actual folder was lowercase movies.

# You changed no Blade file in Part D, yet your pages still work. Why not?

I did make Blade changes in this work, so it wouldn’t be accurate to say I changed none. The list page already had a loop to display movies, but the controller and view needed to agree on the variable name. I also updated the detail view to use the variable passed by the show() method.