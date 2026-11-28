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

## LESSON 13. README.
## Search, Sort, and Pagination

## Question.

## Your HomeController is not a resource controller. Name two things an index() on a resource controller does that yours does not have to.

My `HomeController@index` only counts movies and genres and passes those totals to the home page. The movie list's `index()` retrieves movie records and handles list features like filtering and pagination, which the home page does not need.

## Your pagination links lost the search term until you added one method. Say what those links contained before, and what the controller therefore received.

Before `withQueryString()`, the page links contained the page number, such as `page=2`, but not the search term or filters. The controller received no search term and showed the full list again.

## A misspelled sort value does not break your page. Explain why that is worse than an error, and what your allowed list does about it.

A misspelled sort value can fail silently, so the page looks normal even though the results are not sorted the way I expected. My allowed list accepts only `title` or `year` and uses `title` when the value is invalid.

## LESSON 14. Authentication and authorisation are not the same. In one sentence each: what did this lesson give you, and what is still missing next meeting?

This lesson taught me that authentication verifies who a user is, while authorization determines what that user is allowed to do. I still need to learn how to define and enforce more detailed permissions, such as roles or policies.

## Why does a successful login call `session()->regenerate()`? What goes wrong if you skip it?

It replaces the session ID after authentication, helping prevent session fixation, where an attacker might try to reuse a session ID they already know. Skipping it leaves the old ID in use.

## Why does a failed login use the same message for a wrong password and an unknown email?

It avoids revealing whether an email address has an account, which could help someone enumerate users.

## Why do `index` and `show` stay public while `create`/`edit`/`update`/`destroy` use `auth`?

Guests can browse the movie list and details, while `create`, `edit`, `update`, and `destroy` change data and therefore require authentication.

## You hid Add (and actions) for guests. Why is that not enough to secure those actions? What actually stops a stranger?

Hiding Add, Edit, or Delete only changes the interface; server-side `auth` middleware on those routes is what blocks unauthenticated requests.

## In screenshot 20 the route name was wrong. Why does auth middleware care that the route is named exactly `login`?

Laravel's authentication middleware redirects unauthenticated users to the route named `login`; if that name is missing or different, the redirect can fail.

## LESSON 15. Deciding Who May

## Your project answered one question last week and a second one this week. Name both questions, say which one your policy answers, and point at the file that answers the other.

Last week I answered, “Who is signed in?” with authentication, and this week I answered, “What can this signed-in user do?” with authorization. `app/Policies/MoviePolicy.php` answers the authorization question by checking the user's `role`, while `app/Http/Controllers/LoginController.php` handles signing in.

## `role` is not in your User model's `$fillable`, and yet you set it and saved it in Tinker. Explain why both of those are true, and say what `$fillable` is actually guarding you against.

In Tinker I assigned `$u->role = 'admin'` directly, which sets the `users.role` attribute rather than mass-assigning it, and `$u->save()` then stores it. `$fillable` on `User` controls mass-assignment methods such as `User::create()` and allows `name`, `email`, and `password`, helping prevent request data from setting fields like `role`.

## A signed-in non-admin typing your create address gets a 403. A guest typing the same address gets your login page. Say which layer produced each response, and why the two are deliberately different.

For `/movies/create`, the `auth` middleware in `routes/web.php` redirects a guest to the `login` route before the controller runs. A signed-in non-admin passes that middleware, but `Gate::authorize('create', Movie::class)` in `MovieController` asks `MoviePolicy`, which refuses the action and returns a 403.

## Your list and detail pages are still open to everybody, and your policy says so. Explain why that is a decision and not something you forgot.

I leave `movies.index` and `movies.show` public so anyone can browse movie titles, genres, ratings, years, and now-showing status without an account. The `viewAny` and `view` methods in `MoviePolicy` return true, while creating, updating, and deleting movies are restricted to admins.

## The same rule is read by your controller and by your list page. What would go wrong if you had written that role check in both places by hand instead of in a policy?

If I wrote the admin check separately in `MovieController` and `movies/index.blade.php`, I could update one and forget the other. Then the page might show a control that the controller rejects, or hide a control even though the controller allows the action; the policy keeps the rule in one place.

## What does `SESSION_LIFETIME` count, what does it not count, and why was there no warning before you found yourself logged out?

`SESSION_LIFETIME` counts how many minutes a session may remain idle; it does not count a fixed total time since login. Laravel notices the expired session when the next request arrives and redirects to login, so there is no warning before that request.

