# Question

## Which column did you turn into a table, and why that one and not another?

I turned the `genre` column into a `genres` table because movies share genres from a fixed list, and a genre could have details of its own later. I didn't make `year` or `rating` a table because they are values, not separate things.

## What number did screenshot 6 show, and why exactly that number?

Screenshot 6 showed 7 queries: one to get the movies, one to load the genre filter options, and one genre lookup for each of the five movies. Without eager loading, each movie asks the database for its genre separately.

## Your belongsTo method is named in the singular. What would break if you made it plural?

Eloquent uses the relationship method name to guess the foreign key. If I named it `genres()`, it would look for `genres_id` instead of `genre_id`, so it wouldn't find the movie's genre correctly.