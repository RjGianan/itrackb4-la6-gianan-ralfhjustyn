# Question

# Q1. Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

A. We use POST because it sends the form data to the server without putting it in the URL. If we used GET, the data would show in the address bar. Also, when we refresh the page, the browser might send the request again and add the same movie twice.

# Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

A. Laravel checks the form data when it reaches $request->validate(...). If something is invalid, Laravel stops the controller there and redirects us back to the form. It also sends the error messages and the values we already entered back to the page.


# Q3. Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

A. The success message doesn’t show on every page because the movie list checks for it before displaying it. The message is temporary Aaand only appears after a movie is added successfully and the app redirects to the movie list.