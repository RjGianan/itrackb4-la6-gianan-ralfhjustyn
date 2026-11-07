## LESSON 11. README.
## Finish Your Own CRUD

## Question.

## Route model binding needs two things to be true. Name both, and say what happens when only one of them is.

Route model binding needs the route parameter name to match the model variable, and the controller parameter must be type-hinted with the model. For example, {movie} matches Movie $movie. If only the name matches, Laravel gives you the route value, not a Movie object. If only the type hint matches but the names don’t, Laravel can’t implicitly bind the movie correctly.

## Your Delete link opened the detail page instead of deleting anything. Explain why.

A link sends a GET request. If it points to the movie’s detail route, Laravel runs show() and opens the detail page. Deleting needs a form that sends a DELETE request, usually with @method('DELETE') and @csrf.

## old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?

old('title', $movie->title) uses the submitted title after validation fails, and uses the saved title when first opening the edit form. Without the second argument, the saved title won’t fill the form initially. If I use only $movie->title, the form won’t show my submitted value after validation fails.

## LESSON 12. README.
## Make the Failures Yours

## Question.

## The top of your error page named a file inside vendor. Say why that was not where your mistake was, and where the page showed you it actually was.

The file at the top was inside vendor because Laravel was handling and displaying the error there; that doesn’t mean the mistake was in Laravel. The stack trace showed where it actually happened: the line in my MovieController that caused the error.

## You wrote one Log::info line with a context array. Name something it will tell you next month that the error page could not.

My log entry can tell me which movie ID was saved, even next month when I’m checking the logs. The error page only showed information about that one error when it happened.

## Your guard answers with 403 instead of redirecting back with a message. Say when each of the two is the better answer.

A 403 is better when the action isn’t allowed, like deleting the only movie in a genre. Redirecting back with a message is better when the user can correct something and try again.

