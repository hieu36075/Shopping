// See https://aka.ms/new-console-template for more information
namespace EX2
{
    class Program
    {
        static void Main(string[] args)
        {
            People p1 = new People("Hieu", 20);
            p1.DisplayPeople();
            People p2 = new People("Hoang", 31);
            p2.DisplayPeople();
            People p3 = new People();
            p3.InputPeople();
            p3.DisplayPeople();

            Student st1 = new Student(8.6);
            st1.Name = "Hieu";
            st1.Age = 21;
            st1.DisplayPeople();
            Console.ReadLine();
        }


    }
}
