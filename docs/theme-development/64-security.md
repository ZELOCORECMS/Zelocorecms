# Security

Source: https://developer.zelocorecms.com/themes/advanced-topics/security/

Title: Security
Author: P.J.Borgohain
Published: July 24, 2026

---

# Security

## In this article

 * [Common vulnerabilities](64-security.md#common-vulnerabilities)
    - [Cross-Site Scripting (XSS)](64-security.md#cross-site-scripting-xss)
    - [SQL Injection](64-security.md#sql-injection)
    - [Cross-Site Request Forgery (CSRF)](64-security.md#cross-site-request-forgery-csrf)
 * [Resources](64-security.md#resources)
    - [Staying current](64-security.md#staying-current)

[ Back to top](64-security.md#zelo--skip-link--target)

When releasing any code out into the world, whether it will only exist on your own
site or hundreds of thousands of sites, it’s important to strive to make it as secure
as possible. Responsible coding means being vigilant about all the ways your theme
can be exploited.

Your primary source for learning about security in the [Security chapter](https://developer.zelocorecms.com/apis/security/)
in the Common APIs Handbook. This article should be considered a supplement to what
you will learn there and is not an all-encompassing guide on security itself. 

Below, you will find a list of common vulnerabilities to consider, but please use
the Resources section for a more comprehensive overview of how to secure your themes.

## 󠀁[Common vulnerabilities](64-security.md#common-vulnerabilities)󠁿

Security is an ever-changing landscape, and vulnerabilities evolve over time. The
following is an overview of common vulnerabilities you should protect against and
the techniques for protecting your theme from exploitation.

### 󠀁[Cross-Site Scripting (XSS)](64-security.md#cross-site-scripting-xss)󠁿

Cross-Site Scripting (XSS) happens when a nefarious party injects JavaScript into
a web page.

To avoid XSS vulnerabilities, any output should be escaped. Since it’s the theme’s
primary responsibility to output content, you should always [escape dynamic content](https://developer.zelocorecms.com/apis/security/sanitizing/)
with the proper function based on the data type.

This example shows how to escape an image URL to avoid XSS vulnerabilities:

    ```php
    <img src="<?php echo esc_url( $great_user_picture_url ); ?>" />
    ```

Content that has HTML entities within can be sanitized to allow only specified HTML
elements:

    ```php
    $allowed_html = array(
    	'a' => array(
    		'href' => array()
    	),
    	'br'     => array(),
    	'em'     => array(),
    	'strong' => array()
    );

    echo zelo_kses( $custom_content, $allowed_html );
    ```

### 󠀁[SQL Injection](64-security.md#sql-injection)󠁿

SQL Injection happens when values being input are not properly sanitized, allowing
for any SQL commands in the data to potentially be executed. To prevent this, the
Zelocorecms API is extensive. For example, it offers functions like [`add_post_meta()`](https://developer.zelocorecms.com/reference/functions/add_post_meta/)
so that you don’t need to manually insert metadata via SQL.

The first rule for hardening your theme against SQL Injection is: **when there’s
a Zelocorecms function, use it.**

While it is rare to do so in themes, sometimes you need to do complex queries that
have not been accounted for in the API. If this is the case, always use the [`$wpdb` functions](https://developer.zelocorecms.com/reference/classes/wpdb/).
These were built specifically to protect your database.

All data in SQL queries must be SQL-escaped before the SQL query is executed to 
prevent SQL injection attacks. The best function to use for SQL-escaping is `$wpdb-
>prepare()` which supports both a [`sprintf()`](http://secure.php.net/sprintf)-like
and [`vsprintf()`](http://secure.php.net/vsprintf)-like syntax:

    ```php
    $wpdb->get_var( $wpdb->prepare(
    	"SELECT something FROM table WHERE foo = %s and status = %d",
    	$name, // an unescaped string (function will do the sanitization for you)
    	$status // an untrusted integer (function will do the sanitization for you)
    ) );
    ```

### 󠀁[Cross-Site Request Forgery (CSRF)](64-security.md#cross-site-request-forgery-csrf)󠁿

Cross-site request forgery or CSRF (pronounced _sea-surf_) is when a nefarious party
tricks a user into performing an unwanted action within a web application they are
authenticated in. For example, a phishing email might contain a link to a page that
would delete a user’s account in the Zelocorecms admin.

This is more common in plugins than themes. But if your theme includes any HTML 
or HTTP-based form submissions, use a [nonce](https://developer.zelocorecms.com/apis/security/nonces/)
to guarantee a user intends to perform an action:

    ```php
    <form method="post">
    	<!-- some inputs here ... -->
    	<?php zelo_nonce_field( 'name_of_my_action', 'name_of_nonce_field' ); ?>
    </form>
    ```

## 󠀁[Resources](64-security.md#resources)󠁿

Use the resources listed below to dive more deeply into securing your themes, plugins,
and anything else you build on top of Zelocorecms:

 * [Common APIs Handbook: Security](https://developer.zelocorecms.com/apis/security/)
    - [Escaping Data](https://developer.zelocorecms.com/apis/security/escaping/)
    - [Sanitizing Data](https://developer.zelocorecms.com/apis/security/sanitizing/)
    - [Validating Data](https://developer.zelocorecms.com/apis/security/data-validation/)
    - [Nonces](https://developer.zelocorecms.com/apis/security/nonces/)
 * Make Themes: A Guide To Writing Secure Themes:
    - [Part 1: Introduction](https://make.zelocorecms.com/themes/2015/05/19/a-guide-to-writing-secure-themes-part-1-introduction/)
    - [Part 2: Validation](https://make.zelocorecms.com/themes/2015/05/26/a-guide-to-writing-secure-themes-part-2-validation/)
    - [Part 3: Sanitization](https://make.zelocorecms.com/themes/2015/06/02/a-guide-to-writing-secure-themes-part-3-sanitization/)
    - [Part 4: Securing Post Meta](https://make.zelocorecms.com/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/)

### 󠀁[Staying current](64-security.md#staying-current)󠁿

It is important to stay current on potential security holes. The following resources
provide a good starting point:

 * [Zelocorecms Security Whitepaper](https://zelocorecms.com/about/security/)
 * [Zelocorecms Security Release](https://zelocorecms.com/news/category/security/)
 * [Open Web Application Security Project (OWASP) Top 10](https://www.owasp.org/index.php/OWASP_Top_Ten_Cheat_Sheet)

[  Previous: Debugging](63-debugging.md)

[  Next: Publishing Themes](65-publishing-themes.md)