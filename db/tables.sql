CREATE TABLE `users_tbl` (
  `User_Id` int NOT NULL,
  `User_Type` enum('Admin','Jobseeker','Employer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Jobseeker',
  `Company_Id` int default NULL,
  `Branch_Id` int default NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Image` text NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Register_Date_Date` datetime NOT NULL
)

CREATE TABLE company_tbl (
  Company_Id INT AUTO_INCREMENT PRIMARY KEY,
  Posted_by INT NOT NULL,
  Name VARCHAR(50) NOT NULL,
  Description VARCHAR(5000) NOT NULL,
  Business_Stream VARCHAR(100) NOT NULL,
  Establishment_Year YEAR NOT NULL,
  Website VARCHAR(50) NOT NULL,
  Phone VARCHAR(20) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Logo TEXT NOT NULL,
  Main_Branch_Id INT,
  FOREIGN KEY (Main_Branch_Id) REFERENCES branch_tbl(Branch_Id)
      ON DELETE SET NULL
);

CREATE TABLE branch_tbl (
  Branch_Id INT AUTO_INCREMENT PRIMARY KEY,
  Company_Id INT NOT NULL,
  City VARCHAR(50) NOT NULL,
  State VARCHAR(50) NOT NULL,
  Country VARCHAR(50) NOT NULL DEFAULT 'India',
  Phone VARCHAR(20),
  Email VARCHAR(50),
  FOREIGN KEY (Company_Id) REFERENCES company_tbl(Company_Id)
      ON DELETE CASCADE
);

CREATE TABLE skills_tbl (
  Skill_Id INT AUTO_INCREMENT PRIMARY KEY,
  Skill_Name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE user_skills_tbl (
  User_Id INT NOT NULL,
  Skill_Id INT NOT NULL,
  FOREIGN KEY (User_Id) REFERENCES user_details_tbl(User_Id) ON DELETE CASCADE,
  FOREIGN KEY (Skill_Id) REFERENCES skills_tbl(Skill_Id) ON DELETE CASCADE,
  PRIMARY KEY (User_Id, Skill_Id) -- Composite primary key ensures no duplicate entries
);

CREATE TABLE job_list_tbl (
  Job_Id INT AUTO_INCREMENT PRIMARY KEY,      -- Primary Key for the table
  Posted_By INT NOT NULL,                     -- User or employer who posted the job
  Title VARCHAR(50) NOT NULL,                 -- Title of the job
  Posted_Time DATETIME NOT NULL,              -- When the job was posted
  Description VARCHAR(1000) NOT NULL,         -- Brief description of the job
  Company_Id INT NOT NULL,                    -- Foreign key referencing the company
  Branch_Id INT NOT NULL,                     -- Foreign key referencing the branch
  Type ENUM('Full-Time', 'Part-Time', 'Contract') NOT NULL,  -- Job type as ENUM
  Requirements TEXT NOT NULL,                 -- Job requirements (e.g., qualifications)
  Benefits TEXT NOT NULL,                     -- Benefits offered for the job
  Salary INT NOT NULL,                        -- Salary offered for the job
  Image TEXT NOT NULL,                        -- Path to an image associated with the job
  Is_Internship BOOLEAN NOT NULL DEFAULT '0',
  Status VARCAR(10) DEFAULT 'ACTIVE',
  FOREIGN KEY (Company_Id) REFERENCES company_tbl(Company_Id) ON DELETE CASCADE,
  FOREIGN KEY (Branch_Id) REFERENCES branch_tbl(Branch_Id) ON DELETE CASCADE,
  FOREIGN KEY (Posted_By) REFERENCES user_details_tbl(User_Id) ON DELETE CASCADE
);

CREATE TABLE experience_tbl (
  Experience_Id INT AUTO_INCREMENT PRIMARY KEY,     -- Unique ID for each experience record
  User_Id INT NOT NULL,                              -- User ID referencing the user
  Is_Current BOOLEAN default '0' NOT NULL,             -- Whether the experience is current
  Company_Id INT NOT NULL,                           -- Company ID (foreign key reference to company_tbl)
  Branch_Id INT NOT NULL,                           -- Branch ID (foreign key reference to branch_tbl)
  Designation VARCHAR(500) NOT NULL,                 -- Designation of the user at the company
  Joining_Date DATE NOT NULL,                        -- Date the user joined the company
  Leaving_Date DATE,                                 -- Date the user left the company (NULL if current)
  FOREIGN KEY (User_Id) REFERENCES user_details_tbl(User_Id) ON DELETE CASCADE,
  FOREIGN KEY (Company_Id) REFERENCES company_tbl(Company_Id) ON DELETE CASCADE,
  FOREIGN KEY (Branch_Id) REFERENCES company_tbl(Branch_Id) ON DELETE CASCADE
);

CREATE TABLE education_tbl (
  Education_Id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique ID for each education record
  User_Id INT NOT NULL,                              -- User ID referencing the user
  Course VARCHAR(1000) NOT NULL,                     -- Course the user studied
  Institute VARCHAR(1000) NOT NULL,                  -- Name of the institute
  Institute_City VARCHAR(1000) NOT NULL,             -- City where the institute is located
  Start_Date DATE NOT NULL,                          -- Date when the user started the course
  End_Date DATE NOT NULL,                            -- Date when the user finished the course
  FOREIGN KEY (User_Id) REFERENCES user_details_tbl(User_Id) ON DELETE CASCADE
)

CREATE TABLE application_tbl (
  Application_Id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique ID for each application
  User_Id INT NOT NULL,                                -- User ID referencing the applicant
  Job_Id INT NOT NULL,                                 -- Job ID the applicant is applying for
  Status ENUM('Pending', 'Accepted', 'Rejected') NOT NULL, -- Application status (pending, accepted, rejected)
  Application_Date DATETIME NOT NULL,                  -- Date and time when the application was submitted
  FOREIGN KEY (User_Id) REFERENCES user_details_tbl(User_Id) ON DELETE CASCADE,
  FOREIGN KEY (Job_Id) REFERENCES job_list_tbl(Job_Id) ON DELETE CASCADE
) 
