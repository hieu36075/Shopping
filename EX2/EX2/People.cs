using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EX2
{
    class People
    {
        private string name;
        private int age;

        public string Name { get => name; set => name = value; }
        public int Age { get => age; set { if (value > 0) age = value; } }


        public People(string name, int age)
        {
            this.name = name;
            this.age = age;
        }

        public People()
        {
        }

        public void DisplayPeople()
        {
            Console.WriteLine($"Name: {Name}, Age: {Age}");

        }

        public void InputPeople()
        {
            Console.Write("Enter name:");
            Name = Console.ReadLine();

            Console.Write("Enter age:");
            Age = int.Parse(Console.ReadLine());
        }

        public override string ToString()
        {
            return $"Name: {Name}, Age: {Age}";
        }

    }
}
