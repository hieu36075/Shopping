using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EX2
{
    class Student : People
    {
        public double Gpa { get; set; }

        public Student(double gpa)
        {
            Gpa = gpa;
        }

        public Student(string name, int age, double gpa) : base(name, age)
        {
            //Name = name;
            //Age = age;
            Gpa = gpa;
        }
    }
}
