*STUDENT CALENDAR*
=====

A Web Application for Teachers and Students

by John Tomici

A Capstone Project Submitted to Ankur Agrawal, PhD

Manhattan College

May 2017

© Copyright 2017 by John Tomici All Rights Reserved

### Abstract
The web application designed by John Costanzo and I for our senior capstone project was conceived as an easy way for teachers to keep their students on top of their schoolwork. Using a calendar as a main feature, students can see the due dates and times for specific assignments, exams, and other significant academic events. Only the teacher has the ability to add events to the calendar, as well as add assignments to the assignments page. From there, the teacher can add grades for each student for a given assignment. The teacher can also edit the course name and course code, which is required upon student registration. Students can view their grades for assignments, and all users can change their password. Student Calendar can be extremely useful for students who want to stay organized, and teachers who want their students to turn in schoolwork on time.

**Keywords:** calendar, assignment, web application, organization, teacher-student communication

### Acknowledgments
I would like to thank John Costanzo for conceptualizing, designing, and developing the application alongside me, as well as the Manhattan College Computer Science department for supplying us with a Turing server to host our web pages and process our PHP code for public access. I would also like to thank Dr. Ankur Agrawal for approving our concept and checking our progress regularly with input.

## Introduction
Student Calendar is a web application created for students and teachers to stay on the same page regarding upcoming events and due dates. Using HTML, CSS, JavaScript, PHP, and Bootstrap (a front-end framework for easy web design), we designed an interface that allows this type of communication and organization. Manhattan College’s Turing server was used to host and process the PHP code, and Apache web server was used for local testing via XAMPP. The site can be accessed by all through John Costanzo’s public HTML directory on the Turing server. Ideally, an application like this would utilize a relation database to store information, such as a MySQL database hosted by Amazon Web Services (RDS). However, due to time constraints, we simply used text files to keep user data. PHP was used to parse the files and fetch data/store values.

**Requirements Specification**
*Functional requirements:*

1. When a user registers an account, the entry for “course code” must match the current code found in the relevant file.

2. Files containing user data should be up to date and updated immediately.

3. User sessions should expire after 60 seconds to ensure that unauthorized users cannot
hijack the accounts of students and teachers.

4. The interface should always be up to date and display the proper data.

*Non-functional requirements:*

1. Backup data should be available at all times in case of system failure.

2. Web pages should open within 3 seconds.

3. The account type (teacher or student) should be stored as a session variable to ensure that
students do not have access to functionalities designed strictly for teachers.

## Design Techniques
One of the main inspirations to create this application was to make it user-friendly. Many sites similar to this exist, but centering ours around the calendar makes getting work on time the focus. Using Bootstrap and JavaScript, we were able to make the design sleek and intuitive. The idea of a navbar along the top of each webpage allowed every feature of the site to be instantly available from wherever the user is. Settings are found in a dropdown menu labeled with the user’s profile name. The calendar responds dynamically within the webpage rather than navigating to another to save time. The site has few features to keep the focus on assignments and their due dates, and to avoid clutter that would confuse users. A minimalistic color scheme keeps readability high.

## Implementation
Once we familiarized ourselves with the Bootstrap framework we began coding. John Costanzo worked mostly on the calendar and familiarized himself with JavaScript and various libraries such as jQuery for handling the on-click events. For the other features, including user authentication, adding, grading, and viewing assignments, and the forum were coded in HTML and PHP using the TextWrangler editor for macOS. PHP was needed for fetching form data via post method, keeping user sessions, and fetching data from the relevant files. The following simple snippet of PHP code was used to manage which features would be accessed by only teachers:

```
<?php
   if($_SESSION['sess_acct'] == "teacher"){
      // Teacher-only feature
   }
?>
```

Since we used text files in place of our databases, not much work was needed for back-end. Instead of connecting to a MySQL database for inserting and querying data, we just wrote to, appended, and read from text files. To only display the most recent 20 messages on the forum, each message/line in the file was put into an array and reversed. A basic for loop was used to then only display 20 messages.

## Testing and Debugging
For every single change made to our code, John and I would immediately transfer the edited PHP file to the Turing server using FileZilla, a free file transfer protocol application. This way, changes were immediately tested. Backups for each file were always on-hand locally, and John and I were always synced up even if we weren’t physically together. If the Turing server was ever acting up, which it often did when sessions were active, I could test changes locally using Apache web server via XAMPP. We were advised to improve our interface appearance, especially that of the login/registration screens, to make it more visually appealing.

## Discussion

### Personal Contribution
The workload was very balanced for the entire project. We made sure to maintain equal contributions. John Costanzo worked mostly on the calendar feature, while I handled the other features. The calendar feature definitely was more difficult than most other features, as neither of
us had much experience with JavaScript and the various libraries involved in its implementation. 3
However, when we were working together in the same room, we would often exchange advice and help to aid in the process. John conceived the idea, inspired by his workplace’s website, and wanted to bring the calendar-focus to an academic environment. We relayed ideas for additional features and sorted out which ones would make the final cut. I used my experience with PHP from my web development course to implement the user authentication and session features.

### Timeline
Once our concept was finalized in late March, we began looking into calendar APIs for our application, and perusing old projects and schoolwork that could be reused and/or integrated for its development. Once we decided to utilize Bootstrap, things started to fall into place. It was easy to integrate the framework into the little we had working. Once the website was presentable, we were confident in adding features. Unfortunately we didn’t find our stride until late into the timeline. If our software requirements specification was less ambitious and more tightly focused, we would have been able to complete tasks at an earlier time, allowing more room for polish and additional features.

### Findings
I found that Bootstrap is an excellent framework to work in. In my future web application endeavors, I will certainly look to use Bootstrap for the front-end interface. It is easy to use and looks minimalistic while professional. I became very comfortable with PHP. I was able to integrate it with HTML with ease once I was fully familiarized.

### Hindsight
There are many things I wish I had done better. For one, I wish we had planned out the timeline better. There was a time during development that I regretted agreeing to create the Student Calendar application instead of another idea. If our SRS was more focused I would be more inclined to work on it diligently. However, the lack of direction at the beginning of the timeline made me ultimately confused with where we were taking it. I also wish we used a relational database instead of text files. It would have made editing, inserting, and deleting data so much easier. We could have used AWS to host our database and process our PHP.

### Ethics
One concern with the student calendar is that the teacher is responsible for adding events to the calendar. If a teacher neglects to add a due date to the calendar, is it their fault if a student forgets to submit the assignment? Perhaps, students can submit calendar events that can be approved by the teacher. Also, the forum provides a place for students to exchange answers to questions. While the teacher has moderation powers over the forum, if they are not online, they can miss cheating discussion.

## Conclusion
Overall, I am proud of this project. I learned a lot about web development, teamwork, and deadlines. Managing your time when assigned a task is key. I think an idea like Student Calendar can be very successful if more fleshed out. It is limited in that it only handles one course for a single teacher, but with some adjustments, it could potentially be used by entire universities. This project has shown that hands-on work is the best way to learn new things. By simply researching and developing software you can get better and discover more things. I am very satisfied with my capstone course and look forward to creating new software in my professional future.

## References
Bootstrap: http://getbootstrap.com/

TextWrangler: http://www.barebones.com/products/textwrangler/

jQuery: https://jquery.com/
