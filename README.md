# High School Grade Management System: System Analysis & Design
*(Phân tích và thiết kế Hệ thống quản lý điểm trường THPT)*


## 1. Overview
This project presents an end-to-end System Analysis and Design workflow to build a Grade Management System for high schools. 

Managing student information, academic performance, and conduct manually is prone to errors and inefficiencies. This system digitizes the entire workflow, transitioning traditional paper-based records into a highly structured relational database accessible via a web application.

The project covers the complete Software Development Life Cycle (SDLC) from requirements elicitation, UML modeling, database design, to full-stack implementation using the MVC architecture.

## 2. Project Objectives
The main objectives of this project are:
- **Requirement Analysis:** Analyze the current manual grading process and define functional/non-functional requirements.
- **System Modeling:** Map out user interactions and business logic using comprehensive UML diagrams (Use Case, Activity, Sequence, Class).
- **Database Architecture:** Design a robust, normalized Relational Database (3NF) to ensure data integrity and enforce complex educational business rules.
- **Implementation:** Build a web-based application to facilitate CRUD operations and automate GPA calculations and academic reporting.

## 3. Project Structure
```text
  ├── docs/          # Final project report (.pdf)
  ├── diagrams/      # UML Diagrams (Use Case, Activity, Sequence, Class, Data Model)
  ├── database/      # Conceptual (ERD), Logical, and Physical Data Models & SQL Scripts
  ├── sourcecode/    # PHP/MySQL source code following MVC pattern
  └── README.md      # Project documentation
```


## 4. Methodology

**4.1 Requirement Elicitation & Business Rules**
- **Current State Analysis:** Surveyed and analyzed the manual processes to identify bottlenecks and system requirements.
- **Business Constraints:** Mapped out strict educational rules including grading coefficients (15-min, Mid-term, Final), GPA calculation formulas, and conduct evaluation criteria.

**4.2 System Modeling (UML)**
- **Use Case Diagrams:** Defined roles and permissions for the system (Admin, Teachers).
- **Activity & Sequence Diagrams:** Visualized the step-by-step flow of data for core modules (Authentication, Students, Teachers, Grades, Conduct).
- **Class Diagrams:** Designed the Object-Oriented structure mapping to the MVC architecture.

**4.3 Database Architecture & Design**
- **Conceptual Design:** Built the Entity-Relationship Diagram (ERD) capturing core entities: `HOCSINH` (Students), `GIAOVIEN` (Teachers), `MONHOC` (Subjects), `LOPHOC` (Classes), and `DIEM` (Grades).
- **Physical Data Model:** Translated the ERD into a physical schema, defining exact Data Types, Primary Keys (PK), Foreign Keys (FK), and constraints to prevent data anomalies.

**4.4 Implementation**
- Developed the web application utilizing the **Model-View-Controller (MVC)** pattern.
- Implemented core CRUD functionalities and academic reporting using PHP and MySQL.

## 5. Technologies
- **Modeling & Design:** Figma (UI/UX), UML Tools (Draw.io/StarUML/PowerDesigner).
- **Database:** MySQL (Relational Database Management System).
- **Programming Languages:** PHP, HTML, CSS.
- **Architecture:** MVC (Model-View-Controller).
- **Documentation:** Microsoft Word, PowerPoint.

## 6. Academic Information
- **University:** University of Information Technology – VNU HCMC (UIT)
- **Faculty:** Faculty of Information Systems
- **Course:** Information Systems Analysis and Design (IS201.O21)
- **Instructor:** MSc. Do Thi Minh Phung

## 7. My Contribution
- **Project Scoping:** Defined the project content and conducted the current state analysis.
- **Database Architecture:** 
  - Designed the Conceptual Database Model (ERD) for the entire system.
  - Successfully converted the ERD into the **Physical Data Model**, establishing table structures, keys, and relational integrity.
- **System Modeling:** designed the Use Case Diagrams, Use Case Specifications, Activity Diagrams, Sequence Diagrams, and Class Diagrams for the **Teacher Information Management** module.
- **Documentation:** Synthesized, edited the final project report, and prepared the presentation slides.

## 8. Contact
**Huỳnh Ngọc Trang**  
- **Email:** hntrang04@gmail.com  
- **LinkedIn:** [Trang Huynh Ngoc](https://www.linkedin.com/in/trang-huynh-ngoc-18128b353/)
