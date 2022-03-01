// See https://aka.ms/new-console-template for more information

namespace Ex3
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Number of songs: ");
            int numSongs = int.Parse(Console.ReadLine());
            List<Song> songs = new List<Song>();
            for (int i = 0; i < numSongs; i++)
            {
                Song s = new Song();
                string[] data = Console.ReadLine().Split("_");
                string type = data[0];
                string name = data[1];
                string time = data[2];
                Song song = new Song();
                song.TypeList = type;
                song.Name = name;
                song.Time = time;

                songs.Add(song);

             }
            Console.WriteLine("Type of list: ");
            string typeList = Console.ReadLine();
            if (typeList == "all")
            {
               foreach (Song song in songs)
               {
                   Console.WriteLine(song.Name);
               }
             }
            else
            {
               foreach (Song song in songs)
               {
                    
                  if (song.TypeList == typeList)
                  {
                        Console.WriteLine(song.Name);
                  }
               }
            }
        }
    } 
}
